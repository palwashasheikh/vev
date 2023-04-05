<?php
namespace App\Http\Controllers\api\VevProducts;
use App\Helper\ApiResponseBuilder;
use App\Helper\helper;
use App\Http\Controllers\Controller;
use App\Models\veveCart;
use App\Models\veveCategory;
use App\Models\veveorderProductDetail;
use App\Models\veveProductmodifer;
use App\Models\veveProduct;
use App\Models\veveProductDetail;
use App\Models\veveRatings;
use App\Models\veveServiceCategory;
use App\Models\veveStores;
use App\Models\veveUser;
use App\Models\veveService;
use App\Models\veveAddresses;
use App\Models\vevOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use phpDocumentor\Reflection\Types\Null_;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class Products extends Controller
{
    private $authorizedUser;
    private $responseData;
    private $category;
    private $path = '/vev/content/products/';

    public function storeProfile(Request $request)
    {
        $this->homeRules = [
            'storeId' => 'Required|numeric'
        ];
        $validator = Validator::make($request->all(), $this->homeRules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $storeId = $request->storeId;
            $storetype = $request->storetype;
            $stores = veveStores::Select('id as storeId', 'store_name', 'banner', 'storedetail')->where('id', "=", $storeId)->where('storeType', "=", $storetype)->get();
            foreach ($stores as $stores_) {
                $responseData['stores'] = $stores_;
            }
            if ($storetype == 'product') {
                $category = veveCategory::with(['listbycategory' => function ($q) use ($storeId, $storetype) {
                    $q->where('products.storeId', "=", $storeId)->where('products.storeType', '=', $storetype)->where('product_images.IsPrimary', "=", 1);
                }])->get();
                foreach ($category as $productsdata_) {
                    if ($productsdata_->listbycategory->isEmpty()) {
                        unset($productsdata_->listbycategory);
                    }
                    $w[] = $productsdata_;
                    $responseData['category'] = $w;
                }
            }
            if ($storetype == 'services') {
                $servicesCategories = veveServiceCategory::with(['listbycategory' => function ($q) use ($storeId, $storetype) {
                    $q->where('services.storeId', "=", $storeId)->where('services.storeType', '=', $storetype)->where('services_images.IsPrimary', "=", 1);;
                }])->get();
                foreach ($servicesCategories as $servicesCategory) {
                    if ($servicesCategory->listbycategory->isEmpty()) {
                        unset($servicesCategory->listbycategory);
                    }
                    $t[] = $servicesCategory;
                    $responseData['category'] = $t;
                }
            }
            $ratings = veveRatings::where("store_id", "=", $request->storeId)
                ->join('veve_user', 'veve_user.id', '=', 'vev_rating.user_id')
                ->select('veve_user.user_name', 'veve_user.UserImage', 'vev_rating.comments', 'vev_rating.rating', 'vev_rating.user_id', 'vev_rating.created_at')
                ->get();
            foreach ($ratings as $ratings_) {
                $r[] = $ratings_;
                $responseData['Ratings'] = $r;
            }

            (!$responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $responseData, null);

        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function ListByCategories(Request $request)
    {
        $categoriesId = $request->categoryId;
        $type = $request->type;
        $productsdata = veveCategory::where('productcategories.type', '=', $type)->with(['listbycategory' => function ($q) use ($categoriesId, $type) {
            $q->select('products.categoriesId', 'products.name', 'product_images.productImages as  image', 'product_details.detail', 'product_details.price', 'products.id');
            $q->where('products.categoriesId', "=", $categoriesId)->where('product_images.IsPrimary', "=", 1);
        }])->get();

        foreach ($productsdata as $productsdata_) {
            foreach ($productsdata_->listbycategory as $data_) {
                $data = ['category' => $productsdata_];
                (!$data) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $data, null);
            }
        }

        $servicesdata = veveServiceCategory::where('servicescategories.type', '=', $type)->with(['listbycategory' => function ($q) use ($categoriesId, $type) {
            $q->select('services.categoriesId', 'services.name', 'services_images.servicesImage as image', 'services.serviceDetail as  detail', 'services.id', DB::raw('price, NULL AS price'));
            $q->where('services.categoriesId', "=", $categoriesId)->where('services_images.IsPrimary', "=", 1);
        }])->get();
        foreach ($servicesdata as $servicesdata_) {
            foreach ($servicesdata_->listbycategory as $data_) {
                $data = ['category' => $servicesdata_];
                (!$data) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $data, null);
            }
        }

        return response()->json(ApiResponseBuilder::getResponse(), 200);

    }

    public function checkcart(Request $request)
    {
        $this->authorizedUser = $request->user();
        if ($this->authorizedUser) {
            $this->responseData['CartItem'] = ['cartCount' => 1];
        } else if (!$this->authorizedUser) {
            $this->responseData['CartItem'] = ['cartCount' => 0];
        }
        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function singleProduct(Request $request)
    {
        $access_token = $request->header('Authorization');

        if (!empty($access_token)) {
            $first = strtok($access_token, '|');
            $ex = explode('Bearer', $first);
            $tokeni = $ex[1];
            $ids = DB::table('personal_access_tokens')->select('tokenable_id')->where('id', $tokeni)->first();
            $idd = json_decode(json_encode($ids), true);
            $cart = veveCart::where('userId', '=', $idd)->select(array(DB::raw('COUNT(cartId) as cartCount')))->get();
            foreach ($cart as $carts) {
                $this->responseData['cart'] = $cart[0]->cartCount;
            }
        } else {
            $cart1 = Null;
            $this->responseData['cart'] = $cart1;
        }
        $this->homeRules = [
            'ProductId' => 'Required|numeric'
        ];
        $validator = Validator::make($request->all(), $this->homeRules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {

            $products = veveProductDetail::where('product_id', $request->ProductId)
                ->join('products', 'products.id', 'product_details.product_id')
                ->select('products.id', 'product_details.detail', 'product_details.price'
                    , 'products.name')
                ->get();
            foreach ($products as $key => $products_) {
                $this->responseData['product'] = $products_;
            }

            $this->responseData['product_images'] = DB::table('product_images')->select('product_images.id as imageId', 'product_images.productImages')->where('ProductId', $request->ProductId)->get();
            $modifiers = veveProductmodifer::select('ModifierId', 'Attribute', 'Value', 'ProductId')->where('ProductId', "=", $request->ProductId)->get(0);
            $attributes = [];
            $finalmodifier = [];

            foreach ($modifiers as $k => $modifier) {
                if (!in_array($modifier->Attribute, $attributes)) {
                    //  $attributes[$modifier->Attribute][][$modifier->Attribute] =  $modifier->Value;
                    $attributes[$modifier->Attribute][] = array_merge(array('Value' => $modifier->Value), array('ModifierId' => $modifier->ModifierId));
                }
//            $attributes[][$modifiers->Attribute] = $modifiers->Value;
                $finalmodifier = $attributes;
            }

            $i = 0;
            foreach ($finalmodifier as $key => $modifiers) {
                $i++;
                $this->responseData['ModifierName' . ($i)] = $key;
                $this->responseData['Modifiers' . ($i)] = $modifiers;
            }
        }
        // $this->responseData = $FinalAttributes;
        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function addToCart(Request $request)
    {
        $this->authorizedUser = $request->user();
        $rules = [
            'modifier1' => 'required|string',
            'modifier2' => 'required|string',
            'ProductId' => 'required|numeric',
            'quantity' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $data = [
                'modifier1' => $request->modifier1,
                'modifier2' => $request->modifier2,
                'userId' => auth()->user()->id,
                'ProductId' => $request->ProductId,
                'quantity' => $request->quantity
            ];
            $cart = veveCart::where('userId', '=', auth()->user()->id)->where('ProductId', '=', $request->ProductId)->get();
            $m = [];
            $m1 = [];
            $q = [];
            foreach ($cart as $c) {
                $m = array_merge($m, array($c->modifier1));
                $m1 = array_merge($m1, array($c->modifier2));
                $q = array_merge($q, array($c->quantity));
                $q1 = intval($c->quantity) + $request->quantity;
            }
            if (in_array($data['modifier1'], $m) && in_array($data['modifier2'], $m1)) {
                $create = veveCart::where('ProductId', '=', $request->ProductId)->where('userId', '=', auth()->user()->id)->update(['quantity' => $q1]);
            } else {
                $create = veveCart::create($data);
            }
            if ($create) {
                $access_token = $request->header('Authorization');
                if (!empty($access_token)) {
                    $first = strtok($access_token, '|');
                    $ex = explode('Bearer', $first);
                    $tokeni = $ex[1];
                    $ids = DB::table('personal_access_tokens')->select('tokenable_id')->where('id', $tokeni)->first();
                    $idd = json_decode(json_encode($ids), true);
                    $cartcount = veveCart::where('userId', '=', $idd)->select(DB::raw('COUNT(cartId) as cartCount'))->first();
                    ApiResponseBuilder::body(1, "Success", $cartcount, null);
                }
                //  ApiResponseBuilder::body(1, "Success", null, null);
            } else {
                ApiResponseBuilder::body(0, "Failed", null, null);

            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function itemRemove(Request $request)
    {
        $this->authorizedUser = $request->user();
        $cartRemove = veveCart::where('cartId', '=', $request->cartId)->delete();
        if ($cartRemove) {
            ApiResponseBuilder::body(1, "Success", $cartRemove, null);
        } else {
            ApiResponseBuilder::body(0, "Failed", $cartRemove, null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function showCartdetail(Request $request)
    {
        $this->authorizedUser = $request->user();
        $cart = DB::table('cart as cr')
            ->leftjoin('products as pro', 'pro.id', '=', 'cr.ProductId')
            ->leftjoin('product_images as img', 'img.ProductId', '=', 'cr.ProductId')
            ->leftJoin('product_details', 'product_details.product_id', '=', 'cr.ProductId')
            ->Select('cr.modifier1', 'cr.modifier2', 'pro.name', 'cr.quantity', 'cr.ProductId',
                'img.productImages', 'product_details.price', 'cr.cartId')
            ->where('img.IsPrimary', '=', 1)
            ->where('userId', auth()->user()->id)
            ->get();
        if ($cart->isEmpty()) {
            ApiResponseBuilder::body(1, "Failed", null, null);
        } else {
            ApiResponseBuilder::body(1, "Success", $cart, null);

        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function updatequantity(Request $request)
    {
        $this->authorizedUser = $request->user();
        $this->homeRules = [
            'cartId' => 'Required|numeric'
        ];
        $validator = Validator::make($request->all(), $this->homeRules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $cart = veveCart::where('cartId', '=', $request->cartId)->update(['quantity' => $request->quantity]);
            if ($cart) {
                ApiResponseBuilder::body(1, "Success", null, null);
            } else {
                ApiResponseBuilder::body(1, "Failed", null, null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function ProceedCheckout(Request $request)
    {
        $this->authorizedUser = $request->user();
        $shippingAddress = veveAddresses::where('userId', '=', auth()->user()->id)->where('Isdefault', '=', 1)->get();
        $this->responseData['ShippingAddress'] = $shippingAddress;
        $this->responseData['Payment'] = $data = ['String' => '43534456'];
        $cartData = DB::table('cart as cr')->leftjoin('product_images as img', 'img.ProductId', '=', 'cr.ProductId')
            ->leftJoin('products', 'products.id', '=', 'cr.ProductId')
            ->leftJoin('product_details', 'product_details.product_id', '=', 'cr.ProductId')
            ->Select('products.name', 'products.storeId', 'cr.modifier1', 'cr.modifier2', 'cr.quantity', 'cr.ProductId', 'img.productImages', 'product_details.price')
            ->where('img.IsPrimary', '=', 1)
            ->where('userId', '=', auth()->user()->id)
            ->get();
        $this->responseData['CartItem'] = $cartData;
        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function orderPlaced(Request $request)
    {
        $this->authorizedUser = $request->user();
        $rules = [ 'OrderDetail.*.userId' => 'required|numeric' ,
            'OrderDetail.*.AddressId'=> 'required|numeric' ,
            'OrderDetail.*.total' => 'required|numeric',
            'OrderDetail.*.PaymentMethodId' => 'required|string',
            'OrderDetail.*.type' => 'required|string',
            'OrderProducts.*.ProductId'=> 'required|numeric',
            'OrderProducts.*.Modifier1'=>'required|string',
            'OrderProducts.*.Modifier2'=>'required|string',
            'OrderProducts.*.Quantity'=>'required|numeric'];

        $access_token = $request->header('Authorization');
        if (!empty($access_token)) {
            $first = strtok($access_token, '|');
            $ex = explode('Bearer', $first);
            $token = $ex[1];
            $ids = DB::table('personal_access_tokens')->where('id', $token)->first();
            $decoded = json_decode($ids->abilities);
        }
        $data = json_decode($request->getContent(), true);
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            ApiResponseBuilder::body(0,ApiResponseBuilder::getMessage($validator),null,$validator->errors());
        }else{
            if (!empty($data["OrderDetail"])) {
                $order = vevOrder::create([
                    'OrderCode' => helper::getOrderCode(),
                    'userId' => $data["OrderDetail"][0]['userId'],
                    'AddressId' => $data["OrderDetail"][0]["AddressId"],
                    'total' => $data["OrderDetail"][0]["total"],
                    'PaymentMethodId' => (int)$data["OrderDetail"][0]["PaymentMethodId"],
                    'type' => $data['OrderDetail'][0]["type"],
                    'orderstatus' => 'placed'
                ]);
                if ($order != null) {
                    if (!empty($data["OrderProducts"])) {
                        foreach ($data["OrderProducts"] as $item) {
                            $opd = veveorderProductDetail::create([
                                'OrderId' => $order->orderId,
                                'ProductId' => $item["ProductId"],
                                'Modifier1' => $item["Modifier1"],
                                'Modifier2' => $item["Modifier2"],
                                'Quantity' => $item["Quantity"],
                            ]);
                            if ($opd) {
                                veveCart::where('userId', auth()->user()->id)->delete();
                                ApiResponseBuilder::body(1, "Success", null, null);
                            } else {
                                ApiResponseBuilder::body(0, "failed", null, null);
                            }
                        }
                            $stores = DB::table('products')
                                ->select(DB::raw('storeId'))->where('id', $item["ProductId"])->first();
                            $storesimage = DB::table('stores')
                                ->select('logo', 'store_name')->where('id', $stores->storeId)->get();
                            foreach ($storesimage as $image) {

                                $this->authorizedUser->notification([
                                    "ReferenceType" => $order->type,
                                    'ReferenceId' => $order->orderId,
                                    'DisplayImage' => $image->logo,
                                    'Title' => $image->store_name,
                                    'status' => $order->orderstatus,
                                    'UserId' => auth()->user()->id,
                                    'Message' => $image->store_name . " " . "Your Order" . " " . $order->OrderCode . " " . "has" . " " . $order->orderstatus,
                                    'BoldWords' => $order->OrderCode . ',' . $image->store_name . ',' . $order->orderstatus
                                ]);
                            }
                        }
                    }
                }
                    if (!empty($decoded->deviceToken)) {
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $apiKey = "AAAAweTFG4w:APA91bFa-7IHloBy66dmcf4alDsb0OthH8dGUTP8ncSgy93esrV9t_Ue9T5-8mYFMP690LzV0mSMQKxlkE7UouirOzGyMOkiB51rpwgn3YkiKBTtQWp_J3yWUewGJy7b7kgl4rSl2aFc";
                        $headers = array(
                            'Authorization:key=' . $apiKey,
                            'Content-Type:application/json'
                        );
                        $notifData = [
                            'title' => $order->orderId,
                            'body' => "Order Has placed",
                            "image" => 'http://vev.smartwaytechnologies.com\public\asset\images\Asset 14.png',
                            'click_action' => "activities.NotifHandlerActivity" //Action/Activity - Optional
                        ];

                        $dataPayload = ['to' => 'My Name',
                            'points' => 80,
                            'other_data' => 'This is extra payload'
                        ];
                        $apiBody = [
                            'notification' => $notifData,
                            'data' => $dataPayload,
                            'time_to_live' => 100,
                            //'to' => '/topics/mytargettopic'
                            //'registration_ids' = ID ARRAY
                            'to' => $decoded->deviceToken
                        ];
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
                        $result = curl_exec($ch);
                        curl_close($ch);
                    }
                }

            return response()->json(ApiResponseBuilder::getResponse(), 200);
        }

}
