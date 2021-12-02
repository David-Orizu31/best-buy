<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MainCategory extends Model
{
        protected $table = 'main_categories';
        protected $fillable = ['id','maincat_name'];
      
          public function categories() {
              return $this->belongsTo(Category::class);
            }
}
