<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->user = User::where('name', 'like', 'admin')->first();
    }


    public function index() {
        //$user = DB::table('users')->where('name', 'like', 'admin')->first();
        $slider1 = Sliders::where('name', 'slider1')->get();

        // var_dump($slider1);

        return view('welcome', [
            'user' => $this->user,
            'slider1' => $slider1,
        ]);
    }

    public function shop()
    {
        return view ('shop.index', [

        ]);
    }

    public function contact()
    {
        return view ('pages.contact', [
            'user' => $this->user,

        ]);
    }

    public function about()
    {
        return view ('pages.about', [

        ]);
    }


}
