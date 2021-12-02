<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

      protected $fillable = ['quantity'];

    public function subcategories() {
        return $this->belongsTo(Subcategory::class);
      }

      public function categories() {
        return $this->belongsTo(Category::class);
      }

      public function maincategories() {
        return $this->belongsTo(MainCategory::class);
      }
  
}
