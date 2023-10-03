<?php

namespace App\Http\Controllers;
use App\Models\ModelController; // Substitua 'Usuario' pelo nome real do seu modelo de usuário

class UserController extends Controller
{
    public function index()
    {
        $users = ModelController::simplepaginate(8); // Isso paginará os resultados para mostrar 15 usuários por página

        return view('users.index', compact('users'));
    }
}
