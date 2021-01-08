<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function shop()
    {
        return view ('shop.index', [

        ]);
    }

    public function contact()
    {
        return view ('pages.contact', [

        ]);
    }

    public function about()
    {
        return view ('pages.about', [

        ]);
    }


}
