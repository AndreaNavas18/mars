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
use App\Models\ObservacionesFiles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class VendedorController extends BaseController
{

    public function listTenderos() {
        $tenderos = DB::table('tenderos')->paginate(10);

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

            if($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('observaciones', 'public');

                $observacionFile = new ObservacionesFiles();
                $observacionFile->slug = 'archivo'. rand(0, 9999) .'-'.$file->getClientOriginalName();
                $observacionFile->path = $path;
                $observacionFile->name = $file->getClientOriginalName();
                $observacionFile->observacion_id = $observation->id;
                $observacionFile->save();
                \Log::info('Archivo guardado con éxito');
            }else{
                \Log::info('No se ha seleccionado un archivo');
            }

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
        $observacionFiles = ObservacionesFiles::all();
    

        return view('modules.vendedor.historial', compact('tenderos', 'observations', 'observacionFiles'));
    }

    public function listObs($id)
    {
        $tendero = Tendero::where('id', $id)->first();
        $observations = Observation::where('tendero_id', $id)->get();
        $observacionFiles = ObservacionesFiles::whereIn('observacion_id', $observations->pluck('id'))
        ->get()
        ->groupBy('observacion_id');
        return view('modules.vendedor.listado-observaciones', compact('tendero', 'observations', 'observacionFiles'));
    }

    public function activarVista(){
        $tokens = DB::table('tokens')->get();
        $tenderos = DB::table('tenderos')->get();
        return view('modules.vendedor.activacion');
    }


    public function activar(Request $request)
    {
        try {
            Log::info('Inicio del método activar');
            $tendero = Tendero::where('cedula', $request->input('cedula'))->first();

            if (!$tendero) {
                Log::info('Tendero no encontrado');
                return redirect()->back()->with('error', 'Tendero no encontrado');
            }

            $token = $request->input('token');

            if (!$token) {
                Log::info('Token no proporcionado');
                return redirect()->back()->with('error', 'Debe escanear un código QR o seleccionar una imagen desde la galería');
            }

            $tokenExists = Token::where('token', $token)->first();

            if (!$tokenExists) {
                Log::info('Token no válido');
                return redirect()->back()->with('error', 'Token no válido');
            }

            if ($tokenExists->status == 'activo') {
                Log::info('Token ya activado');
                return redirect()->back()->with('error', 'Token ya activado');
            }

            $tokenExists->update([
                'status' => 'activo',
                'tendero_id' => $tendero->id
            ]);

            $user = User::where('username', $tendero->cedula)->first();
            if (!$user) {
                Log::info('El usuario ya existe');
                $user = User::create([
                    'name' => $tendero->nombre,
                    'username' => $tendero->cedula,
                    'password' => bcrypt($tendero->cedula)
                ]);
            }

            $roleTendero = Role::firstOrCreate(['name' => 'tendero']);
            $permissionTendero = Permission::firstOrCreate(['name' => 'vista.tendero']);

            if (!$user->hasRole($roleTendero)) {
                $user->assignRole($roleTendero);
            }

            if (!$roleTendero->hasPermissionTo($permissionTendero)) {
                $roleTendero->givePermissionTo($permissionTendero);
            }

            if ($tendero->user_id !== $user->id) {
                $tendero->user_id = $user->id;
                $tendero->save();
            }

            Log::info('Tendero activado exitosamente');
            return redirect()->route('home')->with('success', 'Tendero activado exitosamente');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('home')->with('error', 'Error al activar tendero');
        }
    }

    public function searchTenderos(Request $request) {
        $searchTerm = $request->input('search');

        $tenderos = DB::table('tenderos')
                    ->where('nombre', 'like', "%$searchTerm%")
                    ->orWhere('cedula', 'like', "%$searchTerm%")
                    ->orWhere('region_nielsen', 'like', "%$searchTerm%")
                    ->paginate(10);

        return view('modules.vendedor.listado-tenderos', ['tenderos' => $tenderos]);
    }


}
