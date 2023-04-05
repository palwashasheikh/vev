<?php
namespace App\Http\Controllers\api\VeveStores;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\veveStores;
use App\Models\veveRatings;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Stores extends Controller
{
    private $authorizedUser;
    private $responseData;

    public function index(Request $request)
    {

        try {
            $dist = 5;
            $shops = DB::Select("SELECT  stores.id,stores.store_name,stores.storeType,vev_rating.rating, lat,stores.store_address, lng ,stores.logo,stores.banner ,3959 * 111.045*
          ASIN(SQRT( POWER(SIN(( $request->latitude - lat)*pi()/180/2),2)
          +COS($request->latitude *pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(( $request->longitude-lng)*pi()/180/2),2)))
          as distance FROM stores
              join `vev_rating`on vev_rating.store_id = stores.id
                   WHERE vev_rating.rating >= '3' AND
          lng between ($request->longitude -$dist/cos(radians( $request->latitude))*69)
          and ( $request->longitude+$dist/cos(radians( $request->latitude))*69)
          and lat between ( $request->latitude-($dist/69))
          and ( $request->latitude+($dist/69))
          having distance < $dist  ORDER   BY vev_rating.rating desc");

            if(empty($shops)){
                ApiResponseBuilder::body(1, null ,null, null);
            }
            else{
            ApiResponseBuilder::body(1, 'Success', $shops, null);
             }
        }
        catch (\Illuminate\Database\QueryException $ex){
            ApiResponseBuilder::body(1, null ,$ex, null);
        }

            return response()->json(ApiResponseBuilder::getResponse(), 200);
        }

}
