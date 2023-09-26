<?php

namespace App\Http\Controllers;

use App\Models\ModelController;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function find_user($data)
    {
        $evento = ModelController::where('id_user', $data)
        ->get();
        if (!$evento) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }


        return response()->json(['message' => 'Usuário encontrado.', 'Data' => $evento], 200);
    
    }}
