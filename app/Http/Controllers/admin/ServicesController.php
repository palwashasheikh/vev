<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\Attribute;
use App\Models\PricingType;
use App\Models\Category;
use Auth;
use Response;

class ServicesController  extends Controller
{

    public function show(){
        return view('services.servicesList');
    }

}
