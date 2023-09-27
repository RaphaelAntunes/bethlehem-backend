<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('new-evento');
    }
    public function membro()
    {
        return view('new-membro');
    }

}
