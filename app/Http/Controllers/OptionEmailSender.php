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
                     ->where(function ($query) use ($search) {
                         $query->where('nome_completo', 'like', '%' . $search . '%')
                               ->orWhere('email', 'like', '%' . $search . '%');
                     })
                     ->limit(4)
                     ->get();
    
        return $users;
    }

    public function getemailsall()
    {
    
        $users = ModelController::select('email')->get();
    
        return $users;
    }
}