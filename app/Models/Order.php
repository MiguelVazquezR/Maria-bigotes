<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'postal_code', 'city', 'shipped_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'notes'])->withTimestamps();
    }

    public function fullAddress()
    {
        return "$this->address, $this->city CP: $this->postal_code";
    }

}
