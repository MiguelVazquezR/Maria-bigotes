<?php

namespace App\Http\Resources;

use App\Models\EventType;
use App\Models\PackType;
use App\Models\ServiceType;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        $start = new Carbon($this->event_date->toDateString() . ' ' . $this->event_start);

        return [
            'id' => $this->id,
            'title' => auth()->id() ? $this->eventType->name . " - Reservación para $this->name" : 'Reservado',
            'start' => $start->toDateTimeString(),
            'end' => $start->addHour()->toDateTimeString(),
            'can_show_details' => auth()->id() ? true : false,
            'color' => auth()->id() ? 'blue' : 'red',
            'textColor' => '#FFFFFF',
            'allDay' => !auth()->id(),
            'name' => $this->name,
            'phone_number' => $this->name,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'event_type' => EventType::find($this->event_type_id)->name,
            'service_type' => ServiceType::find($this->service_type_id)->name,
            'pack_type' => PackType::find($this->pack_type_id)->name,
            'how_hear_about_us' => $this->how_hear_about_us,
            'number_invites' => $this->number_invites,
            'comments' => $this->comments,
            'start_iso' => $start->subHour()->isoFormat('dddd DD MMMM, YYYY - hh:mm a'),
            'end_iso' => $start->addHour()->isoFormat('hh:mm a'),
        ];
    }
}
