<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['_id'];

    public function customers() {
        return $this->hasMany(Customer::class);
    }
}
