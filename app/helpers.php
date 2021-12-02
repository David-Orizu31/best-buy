<?php
function presentPrice($price)
{
    // return   '$'.number_format($price / 100, 2);
     return   '$ '.number_format($price);
}
function getNumbers()
{



    $tax = config('cart.tax') ;
    // dd(Cart::subtotal());
    $withoutTax = Cart::subtotal() ;
    // $totalPrice = Cart::subtotal() +  $tax;
    $totalPrice = Cart::subtotal() ;
    // not active anymore but could be found in config/cart;
    $ship = config('cart.deliveryfee') ;

    $value = Session::get('coupon') / 100 * str_replace(',', '',Cart::subtotal()) ?? 0 ;
    // dd(Cart::subtotal());
    // $code =  Session::get('code')  ;
    // dd($value);
    // $discount = session()->get('coupon')['discount'] ?? 0;

    // $code = session()->get('coupon')['code'] ?? null;
    // dd($code);
    $newSubtotal = (str_replace(',', '',Cart::subtotal()) - $value);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotalShipping = $newSubtotal ;
    $newTotal = $newSubtotal * (1 + $tax);
    $shiping = str_replace(',', '',Cart::subtotal()) + $newTotalShipping;
// dd($shiping);

    return collect([
        'withoutTax' => $withoutTax,
        'tax' => $tax,
        'totalPrice' => $totalPrice,
        'shiping' => $shiping,
        // 'discount' => $discount,
        // 'code' => $code,
        'value' => $value,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function getStockLevel($quantity)
{


    if ($quantity > setting('site.stock_threshold')) {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold') && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }

    return $stockLevel;
}

function productImages($path)
{
    // dd($path);
    return $path && file_exists('storage/'.$path)  ? asset('storage/'.$path) : asset('storage/'.$path);
}


function productImage($path)
{

    return $path && file_exists('storage/'.$path)  ? asset('storage/'.$path) : asset('No_picture_available.png');
}

function setActiveCategory($path)
{

    return Request::is($path . '*') ? ' class=active' :  '';
}
// function createUser($overrides = [], $amount = 1){
//     $users = factory(\App\User::class, $amount)->create($overrides);
//     if (count($users) == 1) {
//         return $users->first();
//     }
//     return $users;
// }
