<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
  protected $table = 'categories';
  protected $fillable = ['id','cat_name'];

    public function subcategories() {
        return $this->belongsTo(SubCategory::class);
      }


      public function products() {
        return $this->hasMany(Product::class);
      }
      
      public function maincategories() {
        return $this->hasMany(MainCategory::class);
      }
}

