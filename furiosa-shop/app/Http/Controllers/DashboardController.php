<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sliders;
use App\Models\Category;
use App\Models\Image;
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
        $slider1 = Sliders::where('name', 'slider1')->get();

        return view('dashboard.home', [
            'sliders' => $slider1,
        ]);
    }


    public function products()
    {
        $products = Product::all();

        return view('dashboard.products', [
            'products' => $products,
        ]);
    }


    public function productEdit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('dashboard.productEdit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productStore(Request $request, $id)
    {
        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move(public_path() . '/uploads/products/', $filename);
            $product->image = $filename;
            $product->save();
        }

        $product->title = $request->input('title');
        if ($request->input('home') != null) {
            $product->home = true;
            
        } else {
            $product->home = false;

        }

        if ($request->input('slug')) {
            $product->slug = $request->input('slug');
            
        }

        if ($request->input('taille')) {
            $product->taille = "";
        
            $product->taille = $request->input('taille');
            
        

        }

        if ($request->input('description')) {
            $product->description = $request->input('description');
        }

        if ($request->input('categories')) {
            $product->categories()->sync([]);

            foreach ($request->input('categories') as $category) {

                $category_id  = Category::where('name', $category)->first();

                $product->categories()->attach([
                    $category_id->id
                ]);
            }
        }


        if ($request->hasFile('images')) {
            $product->images()->sync([]);

            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' . $extension;
                $file->move(public_path() . '/uploads/products/', $filename);

                $image  = new Image();
                $image->name = $filename;
                $image->slug = $filename;
                $image->save();

                $product->images()->attach([
                    $image->id
                ]);
            }
        }


        $product->save();

        return redirect()->route('dashboard.products')->with('success', 'La page home a bien mise a jour.');
    }

    public function productDelete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('dashboard.products')->with('success', 'Le product à bien été suprimé.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sliderStore(Request $request, $id)
    {
        $slider1 = Sliders::find($id);

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

    public function productNew()
    {
        $categories = Category::all();
    
        return view('dashboard.productAdd', [
            'categories' => $categories
        ]);
    }


    public function productAdd(Request $request)
    {
        $product = new Product();

        $product->title = $request->input('title');

        $product->slug = str_replace(' ', '', strtolower($request->input('title')));
        $product->subtitle = strtolower($request->input('title'));


        if ($request->input('description')) {
            $product->description = $request->input('description');
        }

        if ($request->input('price')) {
            $product->price = $request->input('price');
        }



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move(public_path() . '/uploads/products/', $filename);
            $product->image = $filename;
            $product->save();
        }


        if ($request->input('categories')) {
            $product->categories()->sync([]);

            foreach ($request->input('categories') as $category) {

                $category_id  = Category::where('name', $category)->first();

                $product->categories()->attach([
                    $category_id->id
                ]);
            }
        }


        if ($request->hasFile('images')) {
            $product->images()->sync([]);

            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' . $extension;
                $file->move(public_path() . '/uploads/products/', $filename);

                $image  = new Image();
                $image->name = $filename;
                $image->slug = $filename;
                $image->save();

                $product->images()->attach([
                    $image->id
                ]);
            }
        }


        $product->save();


        return redirect()->route('dashboard.products')->with('success', 'Le produit à bien été créé.');
    }


    public function sliderEdit($id)
    {
        $slider = Sliders::find($id);

        return view('dashboard.sliderHome', [
            'slider' => $slider,
        ]);
    }

    public function sliderNew()
    {
        return view('dashboard.sliderAdd', []);
    }



    public function sliderAdd(Request $request)
    {
        $slider1 = new Sliders();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move(public_path() . '/uploads/images/', $filename);
            $slider1->image = $filename;
        }

        $slider1->name = "slider1";

        $slider1->title = $request->input('title');

        if ($slider1->description != null) {
            $slider1->description = $request->input('description');
        }

        $slider1->save();


        return redirect()->route('dashboard.home')->with('success', 'Le slider à bien été créé.');
    }

    public function sliderDelete(Request $request, $id)
    {
        $slider = Sliders::find($id);
        $slider->delete();

        return redirect()->route('dashboard.home')->with('success', 'Le slider à bien été suprimé.');
    }
}
