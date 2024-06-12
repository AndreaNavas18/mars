<?php

namespace App\Http\Controllers\Tenderos;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Observation;
use App\Models\Tendero;
use App\Models\User;
use App\Models\Cumplimiento;
use App\Imports\TenderoImport;
use App\Imports\TokenImport;
use App\Imports\EmpleadoImport;

class TenderoController extends BaseController
{
    public function index()
    {
        $tenderos = DB::table('tenderos')->get();
        return view('tendero.index', ['tenderos' => $tenderos]);
    }

    public function adminTenderos() {
        $tenderos = DB::table('tenderos')->paginate(10);

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
            $tendero->puntos = 0;
            $tendero->cedula = $request->cedula;
            $tendero->producto = $request->producto;
            $tendero->canal = $request->canal;
            $tendero->subcanal = $request->subcanal;
            $tendero->region_nielsen = $request->region_nielsen;
            $tendero->drop_size = $request->drop_size;
            $tendero->frecuencia = $request->frecuencia;
            $tendero->prob_compra = $request->prob_compra / 100;
            $tendero->cuota_mes = $request->cuota_mes;

            $tendero->save();

            //Creacion del cumplimiento por tendero
            $cumplimiento = new Cumplimiento();
            $cumplimiento->tendero_id = $tendero->id;
            $cumplimiento->mes_1 = 0;
            $cumplimiento->mes_2 = 0;
            $cumplimiento->mes_3 = 0;
            $cumplimiento->mes_4 = 0;
            $cumplimiento->mes_5 = 0;
            $cumplimiento->mes_6 = 0;

            $cumplimiento->save();
                    
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
            $tendero->cedula = $request->cedula;
            $tendero->puntos = $request->puntos;
            $tendero->producto = $request->producto;
            $tendero->canal = $request->canal;
            $tendero->subcanal = $request->subcanal;
            $tendero->region_nielsen = $request->region_nielsen;
            $tendero->drop_size = $request->drop_size;
            $tendero->frecuencia = $request->frecuencia;
            $tendero->prob_compra = $request->prob_compra / 100;
            $tendero->cuota_mes = $request->cuota_mes;
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

    public function importTenderos(Request $request){

        if($request->hasFile('tenderodocumento')){

            $file = $request->file('tenderodocumento');
            Excel::import(new TenderoImport, $file);
            Log::info("funcione, importe los tenderos");

            return redirect()->back()->with('success', 'Listado de tenderos importados exitosamente');
        }else {
            Alert::error('Error', 'Error al importar archivo.');
            Log::info("no funcioneeee, con los tenderos");
            return redirect()->back()->with('error', 'No se importaron correctamente los tenderos');
        }

    }

    public function importTokens(Request $request){

        if($request->hasFile('tokendocumento')){

            $file = $request->file('tokendocumento');
            Excel::import(new TokenImport, $file);

            return redirect()->back()->with('success', 'Listado de tokens importados exitosamente');
        }else {
            Alert::error('Error', 'Error al importar archivo.');
            return redirect()->back()->with('error', 'No se importaron correctamente los tokens');
        }

    }

    public function importEmpleados(Request $request){

        if($request->hasFile('empleadodocumento')){

            $file = $request->file('empleadodocumento');
            Excel::import(new EmpleadoImport, $file);

            return redirect()->back()->with('success', 'Listado de empleados importados exitosamente');
        }else {
            Alert::error('Error', 'Error al importar archivo.');
            return redirect()->back()->with('error', 'No se importaron correctamente los empleados');
        }

    }

    public function searchTenderos(Request $request) {
        $searchTerm = $request->input('search');

        $tenderos = DB::table('tenderos')
                    ->where('nombre', 'like', "%$searchTerm%")
                    ->orWhere('cedula', 'like', "%$searchTerm%")
                    ->orWhere('region_nielsen', 'like', "%$searchTerm%")
                    ->paginate(10);

        return view('modules.admin.administrar', ['tenderos' => $tenderos]);
    }
}