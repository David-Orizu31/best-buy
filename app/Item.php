<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{

    protected $table = "items";

    protected $fillable = [
        'item_name',
        'image',
        'images',
        'item_description',
        'item_quantity',
        'item_price',
        'category_id'
    ];

    public function categories() {
        return $this->belongsTo(Category::class);
      }
    
      public function users() {
        return $this->belongsTo(User::class);
      }
}
