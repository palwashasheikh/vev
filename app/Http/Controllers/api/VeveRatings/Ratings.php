<?php
namespace App\Http\Controllers\api\VeveRatings;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\api\VeveStores\Stores;
use App\Http\Controllers\Controller;
use App\Models\veveRatings;
use App\Models\veveStores;
use App\Models\veveUser;
use Illuminate\Http\Request;
use Validator;
use Auth;
class Ratings extends Controller
{
    private $authorizedUser;
    public $store_id;

    public function addReview(Request $request)
    {
        $this->authorizedUser=$request->user();
        $rules = [
            'storeId' => 'required|numeric',
            'ratings' => 'required|numeric',
            'comments' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {

            $data = [
                'rating' => $request->ratings,
                'comments' => $request->comments,
                'user_id' => auth()->user()->id,
                'store_id' => $request->storeId,
            ];
            $ratings = veveRatings::create($data);
            $this->responseData = array(
               'data'=> $ratings
            );
            ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }
    public function showReview(Stores $stores)
    {



    }

}
