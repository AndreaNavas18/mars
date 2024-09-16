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
        $this->middleware('throttle:3,1')->only('login');
    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/saliendo');
    }

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
                if($user->terms == 0){
                    return redirect()->route('terminos');
                }else{
                    return redirect()->route('home');
                }
            } elseif (!isset($tokenModel) || $tokenModel->status === 'inactivo') {
                return redirect()->back()->with('error', 'No tiene activo el token');
            }
        } else {
            if (Hash::check($request->password, $user->password)) {
                if($user->passwordchanged == 0){
                    //Validacion y redireccionamiento a cambio de contraseña
                    Auth::login($user);
                    return redirect()->route('home');
                }else {
                    auth()->login($user);
                    Log::info('No es tendero');
                    return redirect()->route('home');
                }
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

    
}
