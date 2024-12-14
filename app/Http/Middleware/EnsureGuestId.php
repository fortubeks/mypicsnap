<?php

namespace App\Http\Middleware;

use App\Models\Event;
use App\Models\Guest;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class EnsureGuestId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user already has a UUID cookie
        $userId = Cookie::get('user_id');
        $defaultEvent = Event::find(1);
        $eventId = $defaultEvent->uid;

        session()->put('uidd', $eventId);

        if (!$userId) {
            // Generate a new UUID and save it as a cookie
            $userId = Str::uuid();
            Cookie::queue('user_id', $userId, 60 * 24 * 30); // Persist for 30 days

            //create guest and store uuid
            //check url and collect event id
            Guest::create([
                'uuid' => $userId,
            ]);
        }

        // Optionally pass the userId to the request object
        $request->merge(['user_id' => $userId, 'event_id' => $eventId]);

        return $next($request);
    }
}
