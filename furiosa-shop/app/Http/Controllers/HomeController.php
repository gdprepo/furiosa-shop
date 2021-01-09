<?php

namespace App\Http\Controllers;

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

        return view('welcome', [
            'user' => $this->user,
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
