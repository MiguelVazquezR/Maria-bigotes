<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'requirements_read',
        'name',
        'phone_number',
        'event_date',
        'event_start',
        'address',
        'postal_code',
        'address_references',
        'number_invites',
        'taste_our_specials',
        'how_hear_about_us',
        'comments',
        'event_type_id',
        'service_type_id',
        'pack_type_id',
    ];

    protected $dates = ['event_date'];

    public function event()
    {
        return $this->belongsTo(EventType::class);
    }

    public function service()
    {
        return $this->belongsTo(ServiceType::class);
    }
    
    public function pack()
    {
        return $this->belongsTo(PackType::class);
    }
}
