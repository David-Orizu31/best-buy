<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Gabievi\Promocodes\Facades\Promocodes;
use Session;
use App\Product;
use App\SubCategory;
use App\Company;
use App\Category;
use App\MainCategory;
use App\Branch;
class CartController extends Controller
{

    public function index()
    {
        // Cart::destroy();
        // $promo =     Promocodes::create(4, 25, ['foo' => 'bar', 'baz' => 'qux'], 2, true );
// dd(Cart::content());

    // dd(getNumbers()->get('deliveryfee'));
    if(Session::get('checks') != 'null' || Session::get('checks') != ''){
        $code =  Session::get('checks')  ;

    }

//  dd($prod);

    $urllink =  Session::get('url')  ;

    $subcategories =  Subcategory::all();
    $maincategory = MainCategory::with('categories')->get();
    $category =       Category::with('subcategories')->get();
    // Session::forget('checks');
// $meme = Session::get('coupon');
//        dd($meme);

    // $itemed = Product::all(['id', 'product_quantity'])->where('id', $cont->id);

// dd($itemed);

        // $mightAlsoLike = Product::mightAlsoLike()->get();
    // dd( $itemed ) ;
        return view('cart.cartreview', compact('code', 'urllink','subcategories','maincategory','category' ))
        ->with([
            // 'mightAlsoLike' => $mightAlsoLike,
            'withoutTax' => getNumbers()->get('withoutTax'),
            'tax' => getNumbers()->get('tax'),
            'totalPrice' => getNumbers()->get('totalPrice'),


            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'shiping' => getNumbers()->get('shiping'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'value' => getNumbers()->get('value'),
            // 'itemed' => $itemed,
        ])
        ;
    }



    public function store(Request $request)
    {

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {

            return $cartItem->id === $request->id;

        });


        if ($duplicates->isNotEmpty()) {
            flash('Error!!! Item is already in your cart!')->error();
          return redirect()->back();
        }


       $productPrice =  Product::where('id', $request->id)->first();

       $price = $productPrice['product_price'];

       Cart::add($request->id, $request->name,  $request->quantity, $price, 0.00, ['image' => $request->image])
            ->associate('App\Product');

        // return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
        flash( 'Item was added to your cart!')->success();
  return redirect()->back();

    }


    public function update(Request $request, $id)
    {

//  return $request->all();


        if ($request->quantity < 1 ) {
            session()->flash('errors', collect(['Quantity must be from 1.']));
            flash('Quantity Must be from 1.')->error();
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            flash('We currently do not have enough items in stock.')->error();
            return response()->json(['success' => false], 400);
        }
        // return $request->all();
        Cart::update($id, $request->quantity);
        flash('Quantity has been updated successfully!')->success();
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Cart::remove($id);
        flash( 'Item has been deleted')->success();
        return back();
    }



    public function billing(Request $request)
    {
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();

// dd($branches->count());
        // dd($company_names);




        // dd($request);
      $delivery =  $request->inlineRadioOptions;

        $fulltotal = getNumbers()->get('totalPrice');
        $finaltotal = $fulltotal;
       if($request->inlineRadioOptions == 'yes'){
         $newesttotal = $finaltotal + 500;

       }else{
        $newesttotal = $finaltotal ;
       }
     $request->session()->put('total', $newesttotal);

//   dd($newesttotal);
        return view('cart.billingaddress',compact('finaltotal','newesttotal','delivery','subcategories','category','maincategory'));
    }

}
