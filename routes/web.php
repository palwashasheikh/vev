<?php
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\admin\Auth\RegisterController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\WelcomeController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StoreProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\ServiceProvider;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\admin\ServiceProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
});
Route::get('SignOut', [CustomAuthController::class, 'SignOut'])->name('SignOut');
Auth::routes();


Route::get('/fc', [CustomAuthController::class, 'profile']);
Route::get('/fc', [FrontEndController::class, 'index'])->name('index');
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('store_profile', [StoreProfileController::class, 'index']);
Route::get('SignIn', [CustomAuthController::class, 'index'])->name('SignIn');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('ForgotPassword', [CustomAuthController::class, 'Showfp'])->name('ForgotPassword');
Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('google');
Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('/validate-user',[CustomAuthController::class,'validateUser'])->name('validateUser');
Route::get('/otp', [CustomAuthController::class, 'ShowOtp'])->name('ShowOtp');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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
Route::get('/facebook', [FacebookController::class, 'facebookRedirect']);
Route::get('/facebook/callback', [FacebookController::class, 'loginWithFacebook']);


//admin route



Route::get('/show', [ServicesController::class, 'show']);

Route::get('/admin', [WelcomeController::class, 'index'])->name('/admin');
Route::get('/map', [WelcomeController::class, 'showMap'])->name('map');
Route::get('/barcod', [WelcomeController::class, 'bcode'])->name('barcod');

//Route::view('/chat', 'chat')->middleware(['role:2']);
//Route::resource('/messages', MessageController::class)->only([
//    'index',
//    'store'
//]);


Route::get('/storeHome/{id}', [StoreController::class, 'index'])->name('storeHome');

// Registration Routes...


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [LoginController::class, 'loginattempt'])->name('loginattempt');
    Route::get('Signup', [RegisterController::class, 'show']);
    Route::post('admin/do', [RegisterController::class, 'signup'])->name('register.custom');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['role:1,2,3']);
    Route::get('/adminDash', [AdminController::class, 'index'])->name('adminDash')->middleware(['role:1']);

Route::get('/addMenu', [AdminController::class, 'createMenu'])->name('addMenu')->middleware(['role:1']);
Route::post('/saveMenu', [AdminController::class, 'storeMenu'])->name('saveMenu')->middleware(['role:1']);
Route::post('/getMenuParentLink', [AdminController::class, 'getMenuParentbyId'])->name('getMenuParentLink')->middleware(['role:1']);

Route::get('/addAttribute', [AdminController::class, 'createAttribute'])->name('addAttribute')->middleware(['role:1']);
Route::post('/saveAttribute', [AdminController::class, 'storeAttribute'])->name('saveAttribute')->middleware(['role:1']);

Route::get('/addPricingType', [AdminController::class, 'createPricingType'])->name('addPricingType')->middleware(['role:1']);
Route::post('/savePricingType', [AdminController::class, 'storePricingType'])->name('savePricingType')->middleware(['role:1']);

Route::get('/addCategory', [AdminController::class, 'createCategory'])->name('addCategory')->middleware(['role:1']);
Route::post('/saveCategory', [AdminController::class, 'storeCategory'])->name('saveCategory')->middleware(['role:1']);

Route::group(['middleware' => ['web', 'auth']], function(){
Route::get('/vendDash', [VendorController::class, 'index'])->name('vendDash')->middleware(['role:2']);
Route::get('/ServicesProvider', [ServiceProviderController::class, 'index'])->name('ServicesProvider')->middleware(['role:3']);
    Route::get('/servicesList', [ServiceProviderController::class, 'servicesList'])->name('servicesList')->middleware(['role:3:1']);
    Route::get('/getService/{id}', [ServiceProviderController::class, 'getService'])->name('getService')->middleware(['role:3']);

    Route::get('/servicesForm', [ServiceProviderController::class, 'formService'])->name('servicesForm')->middleware(['role:3']);
    Route::get('/addStore', [VendorController::class, 'create'])->name('addStore')->middleware(['role:2']);
    Route::post('/createStore', [StoreController::class, 'createStore'])->name('createStore')->middleware(['role:1']);

    Route::get('/addproduct', [VendorController::class, 'createProduct'])->name('addproduct')->middleware(['role:2']);
    Route::post('/saveProduct', [VendorController::class, 'storeProduct'])->name('saveProduct')->middleware(['role:2']);
    Route::get('/productList', [VendorController::class, 'productListing'])->name('productList')->middleware(['role:2']);
    Route::post('/getProductByStore', [VendorController::class, 'fetchProductByStore'])->name('getProductByStore')->middleware(['role:2']);

    Route::get('/addProductDetails', [VendorController::class, 'createProductDetails'])->name('addProductDetails')->middleware(['role:2']);
    Route::post('/saveProductDetails', [VendorController::class, 'storeProductDetails'])->name('saveProductDetails')->middleware(['role:2']);

    Route::get('/addProductAttributes', [VendorController::class, 'createProductAttributes'])->name('addProductAttributes')->middleware(['role:2']);
    Route::post('/saveProductAttributes', [VendorController::class, 'storeProductAttributes'])->name('saveProductAttributes')->middleware(['role:2']);
    Route::get('/servicesCategories', [ServiceProviderController::class, 'servicesCategories']);

    Route::post('saveService', [ServiceProviderController::class,'saveService'])->name('saveService');
    Route::post('addProduct', [VendorController::class,'addProduct'])->name('addProduct');

    Route::get('store', [StoreController::class,'vendorStores'])->name('store');
    Route::get('storeList', [StoreController::class,'storeList'])->name('storeList');
    Route::get('storeEdit/{id}', [StoreController::class, 'storebyid']);
    Route::get('/form', [VendorController::class, 'formProducts'])->name('form')->middleware(['role:2']);
    Route::post('file_upload', [VendorController::class,'file_upload'])->name('file_upload');

    Route::get('/storeForm', [StoreController::class, 'storeForm'])->name('storeForm')->middleware(['role:2']);
    Route::get('productById/{id}', [VendorController::class, 'productById']);

    Route::post('updateProduct', [VendorController::class, 'updateProduct'])->name('updateProduct');


    Route::get('userlist', [StoreController::class, 'userlist'])->name('userlist');
    Route::post('updateStore', [StoreController::class, 'updateStore'])->name('updateStore');

});
Route::get('changeStatus', [StoreController::class, 'changeStatus'])->name('changeStatus');
Route::get('editProfile', [ProfileController::class, 'editProfile'])->name('editProfile');

Route::post('updateProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');

Route::get('changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');

Route::post('updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePassword');
