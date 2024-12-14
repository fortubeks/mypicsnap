<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EventController extends Controller
{
    public function index($eventId)
    {
        $userId = Cookie::get('user_id');
        $guest = Guest::where('uuid', $userId)->first();
        if ($guest) {
            $guest->update(['event_id', $eventId]);
        }
        return view('welcome');
    }

    public function show($id) {}

    public function store(Request $request) {}

    public function addGuestToEvent(Request $request)
    {
        //add guest to event and redirect to event page
        $request->validate([
            'guest_name' => 'required',
            'event_id' => 'required'
        ]);
        $guestName = $request->guest_name;
        $event = Event::findOrFail($request->event_id);

        $guest = Guest::create([
            'name' => $guestName,
            'event_id' => $event->id
        ]);

        //update guest id in session
        $request->session()->put('guest_id', $guest->id);

        return redirect('events/' . $event->id);
    }
}
