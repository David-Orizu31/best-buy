<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'order_unique_id',
        'order_item_name',
        'order_product_id',
        'order_status',
        'order_billing_name',
        'order_amount',
        'user_id',
        'delivery_status',
        'gender',
        'card_name',
        'card_number',
        'expiration_month',
        'expiration_year',
        'cvv',
        'optional_address',
        'state',
        'city',
        'payment_type'
    ];


    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('order_quantity','order_companies');
    }
}
