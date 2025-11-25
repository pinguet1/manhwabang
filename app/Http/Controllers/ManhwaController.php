<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Manhwas;

class ManhwaController extends Controller
{
    public function index()
    {
        $manhwas = Manhwas::all();

        return view('welcome', [
            'manhwas' => $manhwas
        ]);
    }
    public function create()
    {
        return view('manhwa');
    }

    public function show()
    {

    }

    public function store()
    {
        Manhwas::create([
            'name' => request('manhwa')
        ]);

        return redirect('/');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
