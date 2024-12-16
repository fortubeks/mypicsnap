<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $eventId = session()->get('uidd');
        $userId = Cookie::get('user_id');
        $images = null;

        if ($request->filter == 'mine') {
            $guest = Guest::where('uuid', $userId);
            $images = Image::where('event_id', $eventId)->where('guest_id', $guest->id)
                ->whereIn('tag', ['pre-wedding', 'welcome-party', 'ceremony', 'after-party'])->get();
        } else {
            $images = Image::whereIn('tag', ['pre-wedding', 'welcome-party', 'ceremony', 'after-party'])->get();
        }

        $groupedImages = $images->groupBy('tag');

        // Access images by tag
        $preWeddingImages = $groupedImages->get('pre-wedding', collect());
        $welcomePartyImages = $groupedImages->get('welcome-party', collect());
        $ceremonyImages = $groupedImages->get('ceremony', collect());
        $afterPartyImages = $groupedImages->get('after-party', collect());

        return view('gallery')->with(compact('preWeddingImages', 'welcomePartyImages', 'ceremonyImages', 'afterPartyImages'));
    }
}
