<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Fillable Example
    // protected $fillable = ['name', 'email', 'status'];

    // Guarded Example
    protected $guarded = ['_id'];

    public function getStatusAttribute($attribute) {
        return [
            0 => 'Inactive',
            1 => 'Active',
        ][$attribute];
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function scopeInactive($query) {
        return $query->where('status', 0);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
