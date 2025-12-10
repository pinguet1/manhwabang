<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Manhwa;
use Illuminate\Http\Request;

class ManhwaController extends Controller
{
    public function index()
    {
        return view('home',
            [ 'genres' => Genre::all(),
            'manhwas' => Manhwa::with('genre')->get()
            ]);
    }

    public function show(Manhwa $manhwa)
    {
        return view('Manhwas.show', ['manhwa' => $manhwa]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'cover_image' => 'required',
            'author' => 'required',
            'description' => 'required',
            'published_at' => 'required',
            'status' => 'required',
            'genres' => 'required|array',
        ]);

        $coverPath = request()
            ->file('cover_image')
            ->store('covers', 'public');
        $attributes['cover_image'] = $coverPath;

        $manhwa = Manhwa::create(
            collect($attributes)->except('genres')->toArray());

        $manhwa->genres()->attach($attributes['genres']);

        return redirect('/');
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
