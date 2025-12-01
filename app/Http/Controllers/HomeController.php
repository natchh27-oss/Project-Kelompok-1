<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Event;
use App\Models\Comment;
use App\Models\GalleryImage;

class HomeController extends Controller
{
    public function index()
    {
        $signatureMenus = Menu::where('is_signature', 1)
                                ->latest()
                                ->take(6)
                                ->get();

        $events = Event::orderBy('date', 'asc')->take(3)->get();

        $comments = Comment::with('user')->latest()->take(12)->get();

        $galleryHome = GalleryImage::where('show_in_home', 1)->get();

        return view('pages.home', compact('signatureMenus', 'events','comments','galleryHome'));
    }
}
