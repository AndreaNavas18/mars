<?php

namespace App\Http\Controllers\Tenderos;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function create()
    {
        return view('modules.admin.crear-tenderos');
    }

    public function store(Request $request)
    {
        try {
            DB::table('tenderos')->insert([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'puntos' => 0,
            ]);
            return redirect()->route('create.tenderos')->with('success', 'Tendero creado con éxito');
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
            DB::table('tenderos')->where('id', $id)->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'puntos' => $request->puntos,
            ]);
            return redirect()->back()->with('success', 'Datos del tendero actualizados exitosamente');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('tendero.edit', $id);
        }
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
