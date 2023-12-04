<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelController;

class OptionEmailSender extends Controller
{
    public function getemails(Request $request)
    {
        $search = $request->input('search');
    
        $users = ModelController::select('nome_completo', 'email', 'imagem')
                 ->where('nome_completo', 'like', '%' . $search . '%')
                 ->limit(5)
                 ->get();
    
        return $users;
    }
}