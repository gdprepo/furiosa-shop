<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('dashboard.index', [
            'user' => $user,
        ]);
    }

    public function home()
    {
        $slider1 = Sliders::where('name', 'slider1')->first();

        return view('dashboard.home', [
            'slider' => $slider1,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sliderStore(Request $request, $id)
    {
        $slider1 = Sliders::find($id)->first();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move(public_path() . '/uploads/images/', $filename);
            $slider1->image = $filename;
            $slider1->save();
        }

        $slider1->title = $request->input('title');

        $slider1->save();

        return redirect()->route('dashboard.home')->with('success', 'La page home a bien mise a jour.');
    }


    public function sliderEdit($id)
    {
        $slider = Sliders::find($id)->first();

        return view('dashboard.sliderHome', [
            'slider' => $slider,
        ]);
    }

}
