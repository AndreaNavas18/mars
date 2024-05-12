<?php

namespace App\Http\Controllers\Tenderos;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Observation;
use App\Models\Tendero;
use App\Models\User;

class TenderoController extends BaseController
{
    public function index()
    {
        $tenderos = DB::table('tenderos')->get();
        return view('tendero.index', ['tenderos' => $tenderos]);
    }

    public function adminTenderos() {
        $tenderos = DB::table('tenderos')->get();

        return view('modules.admin.administrar', ['tenderos' => $tenderos]);
    }

    public function observaciones() {
        $tenderos = DB::table('tenderos')->get();
        $users = DB::table('users')->get();
        $observations = DB::table('observations')->get();
        return view('modules.admin.observaciones', ['tenderos' => $tenderos, 'users' => $users, 'observations' => $observations]);
    }

    public function create()
    {
        return view('modules.admin.crear-tenderos');
    }

    public function store(Request $request)
    {
        try {
            $tendero = new Tendero();
            $tendero->nombre = $request->nombre;
            $tendero->apellido = $request->apellido;
            $tendero->direccion = $request->direccion;
            $tendero->telefono = $request->telefono;
            $tendero->puntos = 0;

            return redirect()->route('home')->with('success', 'Tendero creado con éxito');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('create.tenderos');
        }
    }

    public function edit($id)
    {
        $tendero = DB::table('tenderos')->where('id', $id)->first();
        return view('modules.admin.editar-tendero', ['tendero' => $tendero]);
    }

    public function update(Request $request, $id)
    {
        try {
            $tendero = Tendero::findOrFail($id);
            $tendero->nombre = $request->nombre;
            $tendero->apellido = $request->apellido;
            $tendero->direccion = $request->direccion;
            $tendero->telefono = $request->telefono;
            $tendero->puntos = $request->puntos;
            $tendero->save();
            
            return redirect()->route('admin.tenderos')->with('success', 'Datos del tendero actualizados exitosamente');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('tendero.edit', $id);
        }
    }

    public function historialObs()
    {
        $observations = DB::table('observations')->get();
        $tenderoIds = $observations->pluck('tendero_id')->unique()->toArray();

        $tenderos = DB::table('tenderos')->whereIn('id', $tenderoIds)->get();
    

        return view('modules.admin.observaciones', compact('tenderos', 'observations'));
    }

    public function listObs($id)
    {
        $tendero = DB::table('tenderos')->where('id', $id)->first();
        $observations = DB::table('observations')->where('tendero_id', $id)->get();
        return view('modules.admin.listado-obs', compact('tendero', 'observations'));
    }

    public function destroy($id)
    {
        try {
            DB::table('tenderos')->where('id', $id)->delete();
            return redirect()->route('tendero.index');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('tendero.index');
        }
    }
}
