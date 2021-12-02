<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Rave;
use App\Order;
use App\SubCategory;
use App\Company;
use App\Category;
use App\Product;
use App\MainCategory;
use App\OrderProduct;
use Illuminate\Support\Str;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function initialize(Request $request)
    {
        // dd($request);
        // dd($request->session()->get('total'));
        $subcategories =  Subcategory::all();
        $maincategory = MainCategory::with('categories')->get();
        $category =       Category::with('subcategories')->get();
                // dd($request);
      $delivery =  $request->inlineRadioOptions;

      $fulltotal = getNumbers()->get('totalPrice');
      $finaltotal = $fulltotal;
     if($request->inlineRadioOptions == 'yes'){
       $newesttotal = $finaltotal + 500;

     }else{
      $newesttotal = $finaltotal ;
     }
  
     $request->validate([
 
        'cvv' => ['required', 'string', 'max:3'],
    ]);

            $order = new Order;
            $order->user_id = auth()->user() ? auth()->user()->id : null;

            // $order->billing_name_on_card = $customer->customer_code;
            $order->order_billing_name = $request->firstname;
            $order->order_billing_email = $request->email;
            $order->order_status = 'Not Confirmed';
            $order->order_amount = $request->session()->get('total');

            $order->order_billing_address = $request->address;
            $order->gender = $request->gender;

            $order->order_unique_id = 'TBB'.Str::random(7).time();

            $order->delivery_status = $request->delivery;
            $order->optional_address = $request->optional_address;
            $order->state = $request->state;
            $order->city = $request->city;
            $order->payment_type = $request->payment_type;
            $order->card_name = $request->card_name;
            $order->payment_type = $request->payment_type;
            $order->card_name = $request->card_name;
            $order->card_number = $request->card_number;
            $order->expiration_month = $request->expiration_month;
            $order->expiration_year = $request->expiration_year;
            $order->cvv = $request->cvv;
            if ($request->expiration_month < date('m') && $request->expiration_year == date('Y')) {
               return view('cart.billingaddress' , compact('subcategories','maincategory','category','finaltotal','newesttotal','delivery'))->with('error' , 'Sorry Your card has expired, your billing cannot be processed');
            }

            $order->save();

            foreach (Cart::content() as $item) {
                $orderproduct = new OrderProduct;
                $orderproduct->order_id = $order->id;
                $orderproduct->product_id = $item->model->id;
                $orderproduct->order_quantity = $item->qty;
                $orderproduct->save();

            }
            // dd('here');
            // dd($orderproduct);
            $purchaseId = $order->order_unique_id;


        $orderamounts =    Product::where('id', $item->model->id)->select('order_amount')->first();

        $orderamount=  $orderamounts->order_amount + 1;
        // dd($orderamount);
          Product::where('id', $item->model->id)->update(['order_amount' => $orderamount]);
            Cart::destroy();
     
 return view('thankyou', compact('subcategories','maincategory','category','finaltotal','newesttotal','delivery','purchaseId'));


        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
