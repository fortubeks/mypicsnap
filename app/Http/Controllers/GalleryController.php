<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Image::whereIn('tag', ['pre-wedding', 'welcome-party', 'ceremony', 'after-party'])->get();
        $groupedImages = $images->groupBy('tag');

        // Access images by tag
        $preWeddingImages = $groupedImages->get('pre-wedding', collect());
        $welcomePartyImages = $groupedImages->get('welcome-party', collect());
        $ceremonyImages = $groupedImages->get('ceremony', collect());
        $afterPartyImages = $groupedImages->get('after-party', collect());

        return view('gallery')->with(compact('preWeddingImages', 'welcomePartyImages', 'ceremonyImages', 'afterPartyImages'));
    }
}
