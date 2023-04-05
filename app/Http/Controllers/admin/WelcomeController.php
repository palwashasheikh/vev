<?php

namespace App\Http\Controllers\admin;

use App\Models\veveStores;
use Illuminate\Http\Request;
use \Milon\Barcode\DNS2D;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('admin.auth.login', );
    }

    public function showMap()
    {
        return view('map');
    }

    public function bcode()
    {
        $bc = new DNS2D();
        return view('bc', compact('bc'));
    }
}
