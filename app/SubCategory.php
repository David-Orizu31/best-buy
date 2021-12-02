<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $fillable = ['id','subcat_name','cat_id'];
  
    public function categories() {
        return $this->hasMany(Category::class);
      }
  
  
        public function products() {
          return $this->hasMany(Product::class);
        }
}
