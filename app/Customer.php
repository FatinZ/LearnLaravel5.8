<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Fillable Example
    // protected $fillable = ['name', 'email', 'status'];

    // Guarded Example (things not allowed mass assignment)
    protected $guarded = ['_id'];

    // Default values
    protected $attributes = [
        'status' => 1
    ];

    // This is a attribute (accessor and mutators)
    public function getStatusAttribute($attribute) {
        return $this->activeOptions()[$attribute];
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

    public function activeOptions() {
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress'
        ];
    }
}
