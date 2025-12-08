<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Manhwa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $manhwas = Manhwa::with('genres')->get();
        //$genres = Genre::all();

        return view('home', [
            'manhwas' => $manhwas
        ]);
        //$genres = Genre::all();
        //$manhwas = Manhwa::all();
        //return view('home', ['manhwas' => $manhwas], ['genres' => $genres]);
    }
}
