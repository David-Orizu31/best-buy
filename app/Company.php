<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    protected $fillable = [
        'company_name',
        'company_unique_id',
        'company_email',
        'company_address',
        'company_number',
        'company_logo',
        'company_landmark',
        'user_id',
        'subdomain',

    ];



    public function products() {
        return $this->hasMany(Product::class);
      }
}
