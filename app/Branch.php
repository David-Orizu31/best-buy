<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{
    
    public function companies() {
        return $this->belongsTo(Product::class);
      }
}
