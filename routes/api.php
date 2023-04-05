<?php

use App\Http\Controllers\api\VeveOrder\Order;
use App\Http\Controllers\api\VeveRatings\Ratings;
use App\Http\Controllers\api\Vevesearch\Search;
use App\Http\Controllers\api\VeveStores\Stores;
use App\Http\Controllers\api\Veveuser\User;
use App\Http\Controllers\api\vevNotification\Notification;
use App\Http\Controllers\api\VevProducts\Products;
use App\Http\Controllers\api\VevServices\Services;
use App\Http\Controllers\api\VeveAddress\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeveMail\Custom_Email;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['auth']], function () {
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//auth api
Route::post('api/user/register',[User::class,'register']);
Route::post('api/user/login',[User::class,'login']);
Route::post('api/user/verify_user',[User::class,'verifyUser']);
Route::post('api/user/validate_user',[User::class,'validateUser']);
Route::get('api/user/send_email',[User::class,'send_email']);
Route::post('api/user/verify_forget_password',[User::class,'verifyForgetPassword']);
Route::post('api/user/verify_code',[User::class,'verify_code']);
Route::put('api/user/change_forget_password',[User::class,'ChangePassword']);
Route::get('api/ratings/showReview',[Ratings::class,'showReview']);
Route::get('api/Stores/Stores',[Stores::class,'storesList']);
Route::get('api/Stores/storesList/{latitude?}/{longitude?}',[Stores::class,'index']);
Route::get('api/Products/storeProfile/{storeId?}{storeType?}',[products::class,'storeProfile']);
Route::get('api/Products/ListByCategories/{categoryId?}',[products::class,'ListByCategories']);
Route::get('api/Products/ProductPreview/{ProductId?}',[products::class,'singleProduct']);
Route::get('api/Search/getSearchResults',[search::class,'getSearchResults']);
Route::get('api/Services/previewServices/{serviceId?}',[Services::class,'singleservice']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::delete('api/Search/clearSearch',[Search::class,'clearSearch']);
    Route::delete('api/Products/itemRemove/{cartId?}',[products::class,'itemRemove']);
    Route::get('api/user/edit_profile',[User::class,'editProfile']);
    Route::post('api/user/update_profile',[User::class,'updateProfile']);
    Route::put('api/user/user_change_password',[User::class,'ChangePasswordUser']);
    Route::delete('api/user/logout',[User::class,'logout']);
    Route::post('api/ratings/addReview',[Ratings::class,'addReview']);
    Route::post('api/Products/addtoCart',[products::class,'addToCart']);
    Route::get('api/Products/showCartData',[products::class,'showCartdetail']);
    Route::patch('api/Products/updateCart/{ProductId?}',[products::class,'updatequantity']);
    Route::post('api/Address/AddShippingaddress',[address::class,'AddUserAddress']);
    Route::get('api/Address/ShowAllAddress',[address::class,'ShowAllAddress']);
    Route::put('api/Address/isDefaultAddress',[address::class,'isDefaultAddress']);
    Route::get('api/Products/ProceedCheckout',[Products::class,'proceedCheckout']);
    Route::get('api/Products/checkcart',[Products::class,'checkcart']);
    Route::post('api/Search/addSearch',[search::class,'addSearch']);
    Route::post('api/Products/orderPlaced',[products::class,'orderPlaced']);
    Route::get('api/Search/getSearch',[search::class,'getSearch']);
//    Route::post('api/Products/ProceedCheckout/',[Products::class,'ProceedCheckout']);
    Route::get('api/Order/orderList',[Order::class,'orderList']);
    Route::get('api/Order/orderDetail',[Order::class,'orderDetail']);
    Route::post('api/Services/Buyservice',[Services::class,'Buyservice']);
    Route::get('api/Notification/getNotifications',[Notification::class,'getNotifications']);

});
Route::get('/clear', function() {

    Artisan::call('key:generate');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});

Route::get('login', [ 'as' => 'login', 'uses' =>function (){
    return response()->json([
        'Flag' => 0,
        'Message' =>'Unauthorized User',
        'Data'=> null,
        'Errors' => array(
            'Authentication'=>'Failed'
        )
    ], 200);
}]);
