<?php

namespace App\Http\Livewire\Events;

use App\Models\EventType;
use App\Models\MBEvent;
use App\Models\PackType;
use App\Models\ServiceType;
use Livewire\Component;

class GuestCalendar extends Component
{
    public $open_modal = false,
        $name,
        $phone_number,
        $address,
        $postal_code,
        $event_date = '2022-11-23',
        $event_start,
        $event_type_id,
        $service_type_id,
        $pack_type_id,
        $number_invites = 20,
        $requirements_read = 0,
        $taste_our_specials = 0,
        $how_hear_about_us,
        $comments;

    protected $listeners = [
        'openModal'
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

    public function openModal()
    {
        $this->open_modal = true;
    }

    public function store()
    {
        $validated = $this->validate();
        MBEvent::create($validated);
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
