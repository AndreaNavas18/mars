<?php

namespace App\Http\Controllers\Vendedores;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Observation;
use App\Models\Tendero;
use App\Models\Token;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class VendedorController extends BaseController
{

    public function listTenderos() {
        $tenderos = DB::table('tenderos')->get();

        return view('modules.vendedor.listado-tenderos', ['tenderos' => $tenderos]);
    }

    public function create($id)
    {
        $tendero = DB::table('tenderos')->where('id', $id)->first();
        return view('modules.vendedor.crear-observacion', compact('tendero'));
    }

    public function store(Request $request, $id)
    {
        try {
            $observation = new Observation();
            $observation->observacion = $request->observacion;
            $observation->tendero_id = $id;
            $observation->user_id = auth()->user()->id;
            $observation->save();

            return redirect()->route('home')->with('success', 'Observación creada con éxito');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('home')->with('error', 'Error al crear la observación');
        }
    }

    public function historialObs()
    {
        $observations = DB::table('observations')->get();
        $tenderoIds = $observations->pluck('tendero_id')->unique()->toArray();

        $tenderos = DB::table('tenderos')->whereIn('id', $tenderoIds)->get();
    

        return view('modules.vendedor.historial', compact('tenderos', 'observations'));
    }

    public function listObs($id)
    {
        $tendero = DB::table('tenderos')->where('id', $id)->first();
        $observations = DB::table('observations')->where('tendero_id', $id)->get();
        return view('modules.vendedor.listado-observaciones', compact('tendero', 'observations'));
    }

    public function activarVista(){
        $tokens = DB::table('tokens')->get();
        $tenderos = DB::table('tenderos')->get();
        return view('modules.vendedor.activacion');
    }

   
    // public function activar(Request $request){
    //     $user = User::where('username', $request->input('username'))->first();
    //     $tendero = Tendero::where('id', $user->tendero_id)->first();
    
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Tendero no encontrado');
    //     }
    
    //     // Verificar cómo se proporcionó el token: desde la cámara o desde la galería
    //     $token = $request->input('token');
    //     if (!$token && $request->hasFile('qr_image')) {
    //         // Si no se proporcionó un token, pero se cargó una imagen desde la galería
    //         $file = $request->file('qr_image');
    //         $image = imagecreatefromstring(file_get_contents($file));
    //         $imageData = getimage($image, 0, 0, imagesx($image), imagesy($image));
    //         $code = jsQR($imageData->data, $imageData->width, $imageData->height);
    
    //         if (!$code) {
    //             return redirect()->back()->with('error', 'No se detectó ningún código QR en la imagen');
    //         }
    
    //         $token = $code->data;
    //     } elseif (!$token) {
    //         // Si no se proporcionó un token y no se cargó una imagen desde la galería
    //         return redirect()->back()->with('error', 'Debe escanear un código QR o seleccionar una imagen desde la galería');
    //     }
    
    //     // Verificar si el token es válido
    //     $tokenExists = Token::where('token', $token)->exists();
    //     if (!$tokenExists) {
    //         return redirect()->back()->with('error', 'Token no válido');
    //     }
    
    //     // Actualizar el estado del token y asociarlo con el tendero
    //     Token::where('token', $token)->update([
    //         'status' => 'activo',
    //         'tendero_id' => $tendero->id
    //     ]);
    
    //     return redirect()->route('home')->with('success', 'Tendero activado exitosamente');
    // }

    public function activar(Request $request)
    {
        try {
            $tendero = Tendero::where('cedula', $request->input('cedula'))->first();

            if (!$tendero) {
                return redirect()->back()->with('error', 'Tendero no encontrado');
            }

            $token = $request->input('token');

            if (!$token) {
                return redirect()->back()->with('error', 'Debe escanear un código QR o seleccionar una imagen desde la galería');
            }

            $tokenExists = Token::where('token', $token)->exists();

            if (!$tokenExists) {
                return redirect()->back()->with('error', 'Token no válido');
            }

            if($tokenExists->status == 'activo'){
                return redirect()->back()->with('error', 'Token ya activado');
            }

            // Actualizar el estado del token y asociarlo con el tendero
            Token::where('token', $token)->update([
                'status' => 'activo',
                'tendero_id' => $tendero->id
            ]);

            $existingUser = User::where('username', $tendero->cedula)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'El usuario ya existe');
            }

            $user = User::create([
                'name' => $tendero->nombre,
                'username' => $tendero->cedula,
                'password' => bcrypt($tendero->cedula)
            ]);

            $roleTendero = Role::firstOrCreate(['name' => 'tendero']);
            $permissionTendero = Permission::firstOrCreate(['name' => 'vista.tendero']);

            if (!$roleTendero->hasPermissionTo($permissionTendero)) {
                $roleTendero->givePermissionTo($permissionTendero);
            }

            $user->assignRole($roleTendero);

            $tendero->user_id = $user->id;
            $tendero->save();

            return redirect()->route('home')->with('success', 'Tendero activado exitosamente');
        }catch(QueryException $e){
            Log::error($e->getMessage());
            return redirect()->route('home')->with('error', 'Error al activar tendero');
        }
        
    }

}
