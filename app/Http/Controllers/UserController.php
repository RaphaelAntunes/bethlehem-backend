<?php

namespace App\Http\Controllers;
use App\Models\ModelController; 
use App\Models\User; 

class UserController extends Controller
{
    public function index()
    {
        $users = ModelController::simplepaginate(8); // Isso paginará os resultados para mostrar 15 usuários por página

        return view('users.index', compact('users'));
    }

    public function indexapi(){
        $users = User::all();
        return response()->json($users);
    }

    
}
