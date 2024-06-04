<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Token;
use App\Models\Tendero;
use App\Models\User;

class TokenController extends Controller
{
    public function procesarToken(Request $request)
    {
        $token = $request->input('token');
        $cedula = $request->input('username');
        $tenderos = DB::table('tenderos')->get();

        if (empty($token) || empty($cedula)) {
            return redirect()->route('error')->with('error', 'Faltan parámetros en la URL');
        }

        $tokenDB = Token::where('token', $token)->first();

        if ($tokenDB) {
            
            $user = User::where('username', $cedula)->first();
            $tendero = Tendero::where('user_id', $user->id)->first();
            
            if ($tendero) {
                $tokenDB->estado = 'activo';
                $tokenDB->tendero_id = $tendero->id;
                $tokenDB->save();
            
                
            return redirect()->route('home')->with('success', 'Token procesado con éxito')->with('tenderos', $tenderos);

            } else {
                // Retornar un mensaje de error si no se encuentra el tendero
                return redirect()->route('error')->with('error', 'Tendero no encontrado');
            }
        } else {
            // Retornar un mensaje de error si no se encuentra el token
            return redirect()->route('error')->with('error', 'Token no válido');
        }

        
    }

}