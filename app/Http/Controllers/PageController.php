<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaveEventModel;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        $eventos = SaveEventModel::all(); // Recupere todos os eventos do banco de dados

        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}",['eventos' => $eventos]);
        }

        return abort(404);
    }
    public function eventos()
    {
        $eventos = SaveEventModel::all(); // Recupere todos os eventos do banco de dados
    
        if (view()->exists("pages.eventos")) {
            return view("pages.eventos", ['eventos' => $eventos]);
        }
    
        return abort(404);
    }
}
