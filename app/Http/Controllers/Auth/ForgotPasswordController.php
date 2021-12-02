<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Subcategory;
use App\Category;
use App\MainCategory;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
        return view('auth.passwords.email', compact('subcategories','maincategory','category'));
    }

}
