<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return Inertia::render('Quotes/index'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required|unique:favorites'
        ]);

       Favorite::create([
        'quote' => $request->quote,
        'user_id' => auth()->user()->id
       ]);

        return redirect()->route('quotes.index');
    }

    public function favorites(Request $request)
    {
        $favorites = Favorite::where('user_id', auth()->user()->id)->get();

        return Inertia::render('Quotes/favorites', compact('favorites')); // Muestra una vista en inertia
    }

    public function destroy($favorite)
    {
        Favorite::destroy($favorite);

        return redirect()->route('quotes.favorites');
    }
}
