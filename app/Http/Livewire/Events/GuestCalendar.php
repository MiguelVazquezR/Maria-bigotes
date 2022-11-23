<?php

namespace App\Http\Livewire\Events;

use App\Models\EventType;
use App\Models\MBEvent;
use App\Models\PackType;
use App\Models\ServiceType;
use Carbon\Carbon;
use Livewire\Component;

class GuestCalendar extends Component
{
    public $open_modal = false,
        $event_id,
        $name,
        $phone_number,
        $address,
        $postal_code,
        $event_date,
        $event_start,
        $event_end,
        $event_type_id,
        $service_type_id,
        $pack_type_id,
        $number_invites = 20,
        $requirements_read = 0,
        $taste_our_specials = 0,
        $how_hear_about_us,
        $comments,
        $show_event = false,
        $show_confirmation_modal = false;

    protected $listeners = [
        'openModal',
        'setInfo'
    ];

    protected $rules = [
        'name' => 'required|string|max:50',
        'phone_number' => 'required|string|max:14',
        'address' => 'required|string|max:100',
        'postal_code' => 'required|numeric|digits:5',
        'event_date' => 'required',
        'event_start' => 'required',
        'event_type_id' => 'required',
        'service_type_id' => 'required',
        'pack_type_id' => 'required',
        'how_hear_about_us' => 'required',
        'number_invites' => 'required|numeric|min:20|max:400',
        'comments' => 'max:191',
    ];

    public function openModal($info)
    {
        $this->reset();
        $this->open_modal = true;
        $this->event_date = Carbon::parse($info['dateStr']);
    }
    
    public function setInfo($event)
    {
        $this->event_id = $event['id'];
        $this->name = $event['extendedProps']['name'];
        $this->phone_number = $event['extendedProps']['phone_number'];
        $this->address = $event['extendedProps']['address'];
        $this->postal_code = $event['extendedProps']['postal_code'];
        $this->name = $event['extendedProps']['name'];
        $this->event_type_id = $event['extendedProps']['event_type'];
        $this->service_type_id = $event['extendedProps']['service_type'];
        $this->pack_type_id = $event['extendedProps']['pack_type'];
        $this->number_invites = $event['extendedProps']['number_invites'];
        $this->comments = $event['extendedProps']['comments'];
        $this->event_start = $event['extendedProps']['start_iso'];
        $this->event_end = $event['extendedProps']['end_iso'];
        $this->show_event = true;
    }

    public function store()
    {
        $validated = $this->validate();
        MBEvent::create($validated);
        $this->reset();
    }
    
    public function delete()
    {
        MBEvent::find($this->event_id)->delete();
        $this->reset();
    }
    
    public function render()
    {
        $this->emit('reset-calendar');

        $events = EventType::all();
        $services = ServiceType::all();
        $packs = PackType::all();

        return view('livewire.events.guest-calendar', compact('events', 'services', 'packs'))->layout('layouts.guest');
    }
}
