<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    // public function login(Request $request)
    // {
    //     $token = $request->input('token');

    //     if ($token) {
    //         // Procesa el token y realiza las acciones necesarias
    //         $tokenModel = Token::where('token', $token)->first();

    //         if ($tokenModel && $tokenModel->status === 'inactivo') {
    //             $user = User::where('username', $request->username)->first();

    //             if ($user && !$tokenModel->tendero_id) {
    //                 $tokenModel->tendero_id = $user->tendero_id;
    //                 $tokenModel->status = 'activo';
    //                 $tokenModel->save();
    //             }
    //         }else if($tokenModel && $tokenModel->status === 'activo' && $tokenModel->tendero_id === auth()->user()->tendero_id){
    //             auth()->login($usuario);
    //             return redirect()->route('home');
    //         }

    //         $usuario = User::where('username', $request->username)->first();

    //         if ($usuario) {
    //             auth()->login($usuario);
    //             return redirect()->route('home');
    //         }else {
    //             // Manejar el caso donde el usuario no existe
    //             return redirect()->back()->with('error', 'El usuario no existe');
    //         }
    //     } else {
    //         // Realiza el proceso de autenticación normal
    //         return $this->showLoginForm($request);
    //     }


         
    // }

    public function login(Request $request)
{
    // Verificar si el usuario existe
    $user = User::where('username', $request->username)->first();
    if (!$user) {
        return redirect()->back()->with('error', 'Credenciales inválidas');
        Log::info('Credenciales inválidas');
    }
    Log::info('Credenciales válidas');
    $role = $user->getRole();
    if ($role === 'tendero') {
        Log::info('Es tendero');
        $tendero = $user->tendero;
        $tokenModel = Token::where('tendero_id', $tendero->id)->first();
        if ($user && isset($tokenModel) && $tokenModel->status === 'activo') {
            auth()->login($user);
            return redirect()->route('home');    
        } elseif (!isset($tokenModel) || $tokenModel->status === 'inactivo') {
            return redirect()->back()->with('error', 'No tiene activo el token');
        }
    
    } else {
        if (Hash::check($request->password, $user->password)) {
            auth()->login($user);
            Log::info('No es tendero');
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }
}

public function checkUserRole(Request $request)
{
    $user = User::where('username', $request->username)->first();
    if ($user) {
        return response()->json(['role' => $user->getRole()]);
    } else {
        return response()->json(['role' => null]);
    }
}

    public function showLoginForm(Request $request)
    {
        // Verificar si se proporcionó un token en la URL
        $token = $request->input('token');

        // Pasar el token a la vista
        return view('auth.login', ['token' => $token]);
    }

    // public function showLoginFormWithToken($token)
    // {
    //     $tokenModel = Token::where('token', $token)->first();

    //     if ($tokenModel && $tokenModel->status === 'inactivo') {
    //         return view('auth.login', ['token' => $token]);
    //     } else {
    //         return redirect()->route('login');
    //     }
    // }

    // public function loginWithToken(Request $request, $token)
    // {
    //     $tokenModel = Token::where('token', $token)->first();

    //     if ($tokenModel && $tokenModel->estado === 'inactivo') {
    //        $user = User::where('username', $request->username)->first();

    //        if ($user && !$tokenModel->tendero_id) {
    //             $tokenModel->tendero_id = $user->tendero_id;
    //             $tokenModel->status = 'activo';
    //             $tokenModel->save();
    //         }
    //     }
    //     return $this->login($request);

    // }
}
