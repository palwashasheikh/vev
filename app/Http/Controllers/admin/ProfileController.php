<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\veveStores;
use App\Models\veveProduct;
use App\Models\veveService;
use App\Models\veveProductDetail;
use App\Models\veveProductImage;
use App\Models\veveProductmodifer;
use App\Models\veveCategory;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use Auth;
use DB;
use Response;
use Validator;

use Intervention\Image\ImageManagerStatic as Image;

class VendorController extends Controller
{
    private $Imageurl = '/vev/content/products';

    public function __construct()
    {
        $this->middleware(['auth', 'role:2']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prodList = veveProduct::join('stores', 'stores.id', '=', 'products.storeId')->where('user_id', '=', Auth::user()->id)->get();
        $prodCount = $prodList->count();
        return view('admin.vendor', compact('prodCount'));
    }


    public function productListing(Request $request)
    {
        $store = veveStores::where('user_id' ,'=',Auth::user()->id)->get();
        $storid = $store->first();
         if($storid->id) {
             $product = DB::Select("select DISTINCT i.ProductId, p.id ,d.price,p.name,i.productImages from products as p left join product_images as i on i.ProductId = p.id left join
    product_details as d on d.product_id = p.id  where p.storeId='" . $storid->id . "'  group by i.ProductId ");
             return view('admin.products.show',compact('product'));

         }
         else{
             return view('admin.products.show')->with('message',"No PRoduct have this store");

         }
    }



    public function formProducts()
    {
        $prductsCat = veveCategory::where('is_Active',1)->get();
        return view('admin.products.create',compact('prductsCat'));
    }



    public function addProduct(Request $request)
    {
        $rules = [
            'ProductName' => 'required|string',
            'productPrice' => 'required|numeric',
            'productCode' => 'required|string',
            'categoriesId' => 'required',
            'productDetail' => 'required',
            'color.*.' => 'required|numeric',
            'size.*.' => 'required|numeric',
            'file.*' => 'mimes:doc,pdf,docx,zip',
            'attributeName.*' => 'required|string',
            'productdetail' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator;
        } else {
            $product = veveProduct::Create(
                [
                    'name' => $request->ProductName,
                    'storeId' => $request->storeId,
                    'categoriesId' => $request->categoriesId,
                ]
            );
            veveProductDetail::Create([
                'detail' => $request->productDetail,
                'price' => $request->productPrice,
                'product_code' => $request->productCode,
                'product_id' => $product->id,
            ]);

            $j = 0; //Variable for indexing uploaded image
            $target_path = storage_path('app/public');
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                $ext = explode('.', basename($_FILES['file']['name'][$i]));
                $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
                $j = $j + 1;
                if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    veveProductImage::create([
                        'productImages' => $target_path . $request->file,
                        'ProductId' => $product->id
                    ]);

                    // }
                    $productdetail = $request->productdetail;
                    $attributename = $request->input(['attributes']);

                    for ($i = 0; $i < count($productdetail); $i++) {
                        for ($j = 0; $j < count($productdetail[$i]); $j++) {
                            $at = $attributename[$j]['attributeName'];
                            $pd = $productdetail[$i][array_keys($productdetail[$i])[$j]];

                            $values = array('Attribute' => $at,
                                'Value' => $pd,
                                'ProductId' => $product->id);
                            DB::table('productmodifiers')->insert($values);
                        }
                    }

                }
            }
        }
    }


    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
    public function productById($id){
        $prductsCat = veveCategory::where('is_Active',1)->get();
        $row = veveProduct::with('product_details','Attributes')->findOrFail($id);

        return  view('admin.products.edit',compact('row','prductsCat'));
    }
    public function updateProduct(){

    }

}
