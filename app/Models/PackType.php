<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function MBEvent()
    {
        return $this->hasMany(MBEvent::class);
    }
}
