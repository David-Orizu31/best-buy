<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\SubCategory;
use App\Category;
use App\MainCategory;
class ProductsController extends Controller
{
    public function index($subdomain)
    {
        $companies =  Company::all();
        $products = Company::with('products')
            ->whereSubdomain($subdomain)
            ->firstOrFail();
            $currentsubdomain = $products->subdomain;
            // dd($products->products);
        return view('companyproducts.index', compact('products','companies','currentsubdomain'));
    }


    public function show($product)
    {

        $subcategories = SubCategory::all();
        $mightlike =  Product::where('featured', 2)->inRandomOrder()->get();
        $product = Product::with('categories')->where('product_id', $product)->first();
        $highdemands = Product::with('maincategories:id,maincat_name')->orderBy('created_at', 'desc')->take(10)->get();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        // dd($product);
        return view('companyproducts.show', compact('product','mightlike', 'highdemands','subcategories','category','maincategory'));
    }


    public function featured()
    {
        $companies =  Company::all();
        $products =  Product::where('featured', 2)->inRandomOrder()->paginate(21);
        $currentsubdomain = null;
        // dd($products);
        return view('featured.index', compact('products','companies','currentsubdomain'));
    }




 
}
