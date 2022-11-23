<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        $start = new Carbon($this->event_date->toDateString() . ' ' . $this->event_start);

        return [
            'id' => $this->id,
            'title' => $this->eventType->name,
            'description' => "Reservación para $this->name",
            'start' => $start->toDateTimeString(),
            'end' => $start->addHour()->toDateTimeString(),
        ];
    }
}
