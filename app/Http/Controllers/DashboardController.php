<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Company;
use App\Product;
use App\Category;
use App\Item;
use App\Models\User;
use App\Models\Cart;

class DashboardController extends Controller
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
    
    public function dashboard()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.overview', compact('highdemands'));
    }

    public function recently()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.recentlyviewed', compact('highdemands'));
    }

    public function coupon()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.coupon', compact('highdemands'));
    }

    public function messages()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.messages', compact('highdemands'));
    }

    public function orders()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.orders', compact('highdemands'));
    }

    public function additems()
    {
        $user = Auth::user()->id;
        $categories = Category::select('id','cat_name') -> get();
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.additems', compact('highdemands' , 'categories'));
    }

    public function saveitems(Request $request)
    {
        $user = Auth::user()->id;

        $request->validate([
            'item_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
            'item_description' => 'required|string|max:255',
            'item_quantity' => 'required|string|max:255',
            'item_price' => 'required|string|max:255',
            'category_id' => 'required|min:1|max:8',
        ]);

        if($request->hasfile('images')) {

            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file -> move(public_path('storage/items/October2021'), $name);  
                $imgData[] = $name;  
            }

        $item = new Item;
        $item->item_name = $request->input('item_name');
        $item->item_description = $request->input('item_description');
        $item->item_quantity = $request->input('item_quantity');
        $item->item_price = $request->input('item_price');
        $item->category_id = $request->input('category_id');
        $imageName = time().'.'.$request->image->extension();  
     
        $item->image = $request->image->move(public_path('storage/items/October2021'), $imageName);
        $item->images = json_encode($imgData);
        $item->user_id = $user;
        $item->save();

        return redirect()->back()->with('success' , 'Item has been added succesfully');

        }
    }

    public function viewitems()
    {
        $user = Auth::user()->id;
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.viewitems', compact('highdemands'));
    }

    public function support()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.support', compact('highdemands'));
    }

    public function editprofile()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(8)->get();
        return view('dashboard.editprofile', compact('highdemands'));
    }

    public function updateprofile(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'min:11'],
            'landmark' => ['required', 'string', 'max:255'],
        ]);
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'tel'=>$request->tel,
                'gender'=>$request->gender,
                'landmark'=>$request->landmark
            ]);

            return redirect('/dashboard/edit-profile')->with('success' , 'Your Profile has been Updated Successfully');
    }

    public function changepass()
    {
        $highdemands = Product::with('company:id,company_name')->orderBy('order_amount', 'desc')->take(10)->get();
        return view('dashboard.changepass', compact('highdemands'));
    }

    public function updatepassword(Request $request)
    {
         $request->validate([
            'old_password' => 'required|min:8|max:100',
            'new_password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:new_password'
         ]);

         User::with( 'name', 'email', 'address', 'tel', 'gender','landmark','password');

         if(Hash::check($request->old_password,(Auth::user()->password))) {

            User::with( 'name', 'email', 'address', 'tel', 'gender','landmark','password')->update([
               'password' => bcrypt($request->new_password)
            ]);

            return redirect()->back()->with('success' , 'Your Password has been updated successfully');

         }else{
             return redirect()->back()->with('error', 'Old password Does not match.');
         }
    }
}
