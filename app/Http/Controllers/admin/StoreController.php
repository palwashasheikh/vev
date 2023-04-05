<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\veveStores;
use App\Models\veveUser;
use App\Models\veveService;
use Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
    private $Imageurl = '/vev/content/stores/';
    private  $store;

    public function vendorStores()
    {
        $user = veveUser::where('id' ,'=',Auth::user()->id)->get();
        $store = veveStores::where('user_id' ,'=',Auth::user()->id)->get();
        $storid = $store->first();
        $recentservices = veveService::where('storeId','=',$storid->id)
            ->select('services.id as id','services.name as name','detail.price as price','cat.categoriesName as categoriesName')
            ->leftJoin('appoimentservice as detail','detail.servicesId','services.id')
            ->leftJoin('servicescategories as cat','cat.categoriesId','services.categoriesId')
            ->orderby('services.id','DESC')
            ->limit('6')
            ->get();
        return view("admin.stores.show", compact('store','user','recentservices'));

    }

    public function storeList(){

        $stores = veveStores::orderby('id','desc')->get();
        return view("admin.stores.list",compact('stores'));

    }
    public function storeServicesList()
    {
        $stores = veveStores::all();
        return view("admin.stores.list",compact('stores'));
    }

    public function userlist(){
        $users = veveUser::with('role')->get();
        return view("admin.stores.form",compact('users'));
    }


    public function createStore(Request $request){
       $rules =[
            'store_name'=> 'required',
            'store_address'=>'required',
            'storeLogo'=>'required',
            'store_phone'=>'required',
            'storeBanner'=>'required',
            'store_detail'=>'required',
            'mobile'=>'required',
           'storetype'=>'required'
            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $stores = new veveStores();
            $this->stores =$stores;
            if ($request->hasFile('storeLogo') && $request->file('storeLogo')->isValid()) {
                $extension = $request->storeLogo->extension();
                $fileName=uniqid().".".$extension;
                if($request->file('storeLogo')->move(public_path($this->Imageurl),$fileName)){
                    $this->logo = $this->Imageurl.$fileName;
                    $this->stores->logo =$this->logo;
                }
            }
            if ($request->hasFile('storeBanner') && $request->file('storeBanner')->isValid()) {
                $extension = $request->storeBanner->extension();
                $fileName=uniqid().".".$extension;
                if($request->file('storeBanner')->move(public_path($this->Imageurl),$fileName)){
                    $this->banner = $this->Imageurl.$fileName;
                    $this->stores->banner = $this->banner;
                }
            }
            $this->stores->store_name = $request->store_name;
            $this->stores->lat = $request->mlat;
            $this->stores->lng = $request->mlong;
            $this->stores->store_address = $request->store_address;
            $this->stores->store_phone = $request->store_phone;
            $this->stores->storedetail = $request->store_detail;
            $this->stores->mobile = $request->mobile;
            $this->stores->storetype = $request->storetype;
            $this->stores->user_id = $request->userid;
            $this->stores->searchtype = $request->storetype;

           if($this->stores->save()){
               return Redirect::back()->with('success',"Your Store  Successfully Created");
           }
           else{
               return Redirect::back()->with('success',"Some Thing Error");
           }
        }
    }

    public function storebyid($id)
    {
        $users = veveUser::with('role')->get();
        $row = veveStores::findOrFail($id);
        return  view('admin.stores.edit',compact('row','users'));
    }
   public function storeForm()
   {
       $users = DB::select('select u.id,u.user_name ,r.role_name from veve_user as u  join  roles as r on u.role_id = r.id where u.role_id != 1');
       return view("admin.stores.form",compact('users'));
   }

    public function changeStatus(Request $request)
    {
        $user = veveStores::find($request->id);
        $user->is_active = $request->is_active;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }


}
