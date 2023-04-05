<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\veveStores;
use App\Models\veveUser;
use Illuminate\Http\Request;
use App\Models\veveMenu;
use App\Models\User;
use App\Models\Attribute;
use App\Models\PricingType;
use App\Models\Category;
use Auth;
use Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:1']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $totalServices = veveStores::where('storeType','=','services')->get();
          $countstoreSevices = $totalServices->count();
        $totalproduct= veveStores::where('storeType','=','product')->get();
        $countstoreproduct = $totalproduct->count();
        $storeOwners = veveUser::where('role_id','=','2')->orwhere('role_id','=','3')->get();
        $countstoreowners = $storeOwners->count();

       return view('admin.dashboard.index', compact('countstoreSevices','countstoreproduct','countstoreowners'));
    }

    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
    public function createMenu()
    {
        $users = User::all();
        $menus = Menu::where('user_id', '=', Auth::user()->id)->get();
        return view('menus.create', compact('users', 'menus'));
    }

    public function getMenuParentbyId(Request $request)
    {
        $data = veveMenu::where('id', '=', $request->value)->orWhere('parent_id', '=', $request->value)->value('menu_link');
        return Response::json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMenu(Request $request)
    {
        $matchThese = array('name'=>$request->name, 'user_id'=>$request->user_id);

        veveMenu::updateOrCreate($matchThese,
                [
                    'name'=>$request->name,
                    'user_id'=>$request->user_id,
                    'parent_id'=>$request->parent_id,
                    'menu_link'=>$request->menu_link
                ]
            );

        return redirect()->route('adminDash');
    }

    public function createAttribute()
    {
        return view('attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAttribute(Request $request)
    {
        $matchThese = array('attr_name'=>$request->attr_name);

        Attribute::updateOrCreate($matchThese,
            [
                'attr_name'=>$request->attr_name
            ]
        );

        return redirect()->route('adminDash');
    }

    public function createPricingType()
    {
        return view('pricing-type.create');
    }

    public function createCategory()
    {
        $cats = Category::all();
        return view('categories.create', compact('cats') );
    }

    public function storeCategory(Request $request)
    {
            $matchThese = array('cat_name'=>$request->cat_name, 'parent_id'=>$request->parent_id);

            Category::updateOrCreate($matchThese,
                [
                    'cat_name'=>$request->cat_name,
                    'parent_id'=>$request->parent_id,
                    'cat_type'=>$request->cat_type
                ]
            );

        return redirect()->route('adminDash');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePricingType(Request $request)
    {
        $matchThese = array('type_name'=>$request->type_name);

        PricingType::updateOrCreate($matchThese,
            [
                'type_name'=>$request->type_name
            ]
        );

        return redirect()->route('adminDash');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
