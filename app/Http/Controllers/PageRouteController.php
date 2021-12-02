<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Product;
use App\Category;
use App\MainCategory;

class PageRouteController extends Controller
{
    public function contact()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('contact', compact('subcategories','category','maincategory'));
    }

    public function about()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('about', compact('subcategories','category','maincategory'));
    }

    public function mission()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('about.mission', compact('subcategories','category','maincategory'));
    }

    public function values()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('about.values', compact('subcategories','category','maincategory'));
    }

    public function history()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('about.history', compact('subcategories','category','maincategory'));
    }

    public function faqs()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('faqs', compact('subcategories','category','maincategory'));
    }

    public function newproducts()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        $newproducts = Product::with('maincategories:id,maincat_name')->orderBy('created_at', 'desc')->take(10)->get();
        return view('newproducts', compact('subcategories','category','maincategory','newproducts'));
    }

    public function terms()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('terms', compact('subcategories','category','maincategory'));
    }

    public function  maincategory($id)
    {
        $maincat = MainCategory::all();   
        $subcategories =  Subcategory::all();
        $categories =       Category::with('products')->get();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        $mainitems = Product::with('categories')->where('maincategory_id' , $id)->get();
        $mainitemname = MainCategory::with('categories')->where('id' , $id)->get();
        return view('categoryshows.maincategory' ,compact('maincategory','category','subcategories','mainitems','mainitemname'));

    }

    public function  category($id)
    {
        $maincat = MainCategory::all();   
        $subcategories =  Subcategory::all();
        $categories =       Category::with('products')->get();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        $catitems = Product::with('categories')->where('category_id' , $id)->get();
        $catitemname = Category::with('subcategories')->where('id' , $id)->get();
        return view('categoryshows.category' ,compact('maincategory','category','subcategories','catitems','catitemname'));


    }

    public function  subcategory($id)
    {
        $maincat = MainCategory::all();   
        $subcategories =  Subcategory::all();
        $categories =       Category::with('products')->get();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        $subcatitems = Product::with('subcategories')->where('subcategory_id' , $id)->get();
        $subcatitemname = SubCategory::where('id' , $id)->get();
        return view('categoryshows.subcategory' ,compact('maincategory','category','subcategories','subcatitems','subcatitemname'));


    }
}
