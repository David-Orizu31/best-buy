<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subcategory;
use App\Product;
use App\Category;
use App\MainCategory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

     $maincat = MainCategory::all();   
     $subcategories =  Subcategory::all();
       $randomproducts =             Product::with('subcategories')->where('featured', '2')->get();
    //    dd($randomproducts);
    $mightlike =  Product::where('featured', 2)->inRandomOrder()->take(7)->get();
   $highdemands = Product::with('maincategories:id,maincat_name')->orderBy('order_amount', 'desc')->take(10)->get();
             $categories =       Category::with('products')->get();
             $maincategory = MainCategory::with('categories')->get();
             $category =       Category::with('subcategories')->get();
    // dd($category);
    //    $highdemands =             Product::with('company')->orderBy('order_amount', 'desc')->take(10)->get();
        return view('welcome', compact('subcategories','randomproducts','highdemands','category','maincategory','mightlike'));

    }
}
