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
        return view('tenderos.index', ['tenderos' => $tenderos]);
    }

    public function create()
    {
        return view('tenderos.create');
    }

    public function store(Request $request)
    {
        try {
            DB::table('tenderos')->insert([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return redirect()->route('tenderos.index');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('tenderos.create');
        }
    }

    public function edit($id)
    {
        $tendero = DB::table('tenderos')->where('id', $id)->first();
        return view('tenderos.edit', ['tendero' => $tendero]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::table('tenderos')->where('id', $id)->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return redirect()->route('tenderos.index');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('tenderos.edit', $id);
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('tenderos')->where('id', $id)->delete();
            return redirect()->route('tenderos.index');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('tenderos.index');
        }
    }
}
