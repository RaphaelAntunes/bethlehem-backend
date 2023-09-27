<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function find_user($data)
    {
        $result = DB::table('users')
            ->join('base_api', 'users.id', '=', 'base_api.id')
            ->where('base_api.id', $data)
            ->get();

        if ($result->isEmpty()) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        return response()->json(['message' => 'Usuário encontrado.', 'Data' => $result], 200);
    }
}
