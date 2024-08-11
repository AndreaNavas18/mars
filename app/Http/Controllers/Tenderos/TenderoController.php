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
use App\Imports\CumplimientoImport;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


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

    public function adminVendedores() {
        $vendedores = DB::table('vendedores')->paginate(10);

        return view('modules.admin.administrar-vendedores', ['vendedores' => $vendedores]);
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
            $tendero->telefono = $request->telefono;
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
    public function editVendedor($id)
    {
        $vendedor = DB::table('vendedores')->where('id', $id)->first();
        return view('modules.admin.editar-vendedor', ['vendedor' => $vendedor]);
    }

    public function updateVendedor(Request $request, $id)
    {
        try {
            $vendedor = Vendedor::findOrFail($id);
            $vendedor->nombre = $request->nombre;
            $vendedor->cedula = $request->cedula;
            $vendedor->email = $request->email;
            $vendedor->telefono = $request->telefono;
            $vendedor->save();
            
            return redirect()->route('admin.vendedores')->with('success', 'Datos del vendedor actualizados exitosamente');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('edit.vendedor', $id);
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
            $tendero->telefono = $request->telefono;
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
            return redirect()->route('edit.tendero', $id);
        }
    }

    public function destroyVendedor($id)
    {
        try {
            $vendedor = Vendedor::findOrFail($id);
            $userid = $vendedor->user_id;

            DB::table('vendedores')->where('id', $id)->delete();
            DB::table('users')->where('id', $userid)->delete();
            return redirect()->route('admin.vendedores')->with('success', 'Vendedor eliminado correctamente.');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('admin.vendedores')->with('error', 'Hubo un error al eliminar el vendedor.');
        }
    }

    public function historialObs()
    {
        $user = auth()->user();

        if( $user->hasRole('admin') ){
              $tenderos = Tendero::whereHas('observations')->with(['observations.user'])->get();
         }else{
            $observations = Observation::where('user_id', $user->id)->get();
            $tenderoIds = $observations->pluck('tendero_id')->unique();
            // $tenderos = Tendero::whereIn('id', $tenderoIds)->with(['observations' => function ($query) use ($user) {
            //     $query->where('user_id', $user->id)->with('user');
            // }])->get();

            $tenderos = Tendero::whereIn('id', $tenderoIds)
            ->whereHas('observations', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with(['observations' => function ($query) use ($user) {
                $query->where('user_id', $user->id)->with('user');
            }])
            ->get();
         }

        return view('modules.admin.observaciones', compact('tenderos'));
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

    public function importCumplimientos(Request $request){

        if($request->hasFile('cumplimientodocumento')){

            $file = $request->file('cumplimientodocumento');
            Excel::import(new CumplimientoImport, $file);

            return redirect()->back()->with('success', 'Listado de cumplimiento importado exitosamente');
        }else {
            Alert::error('Error', 'Error al importar archivo.');
            return redirect()->back()->with('error', 'No se importó correctamente la información');
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

    public function searchVendedores(Request $request) {
        $searchTerm = $request->input('search');

        $vendedores = DB::table('vendedores')
                    ->where('nombre', 'like', "%$searchTerm%")
                    ->orWhere('cedula', 'like', "%$searchTerm%")
                    ->paginate(10);

        return view('modules.admin.administrar-vendedores', ['vendedores' => $vendedores]);
    }

    public function createVendedor()
    {
        return view('modules.admin.crear-vendedores');
    }

    public function storeVendedor(Request $request){
        try {
            if($request->tipouusuario == 'vendedor'){
                $vendedor = new Vendedor();
                $vendedor->nombre = $request->nombre;
                $vendedor->cedula = $request->cedula;
                $vendedor->email = $request->email;
                $vendedor->telefono = $request->telefono;
                $vendedor->canal = $request->canal;
                $vendedor->perfil = $request->perfil;
                $vendedor->save();
    
                $user = new User();
                $user->name = $request->nombre . ' ' . $request->apellido;
                $user->username = $request->cedula;
                $user->email = $request->email;
                $user->password = bcrypt($request->cedula);
                $user->save();
                
                $vendedor->user_id = $user->id;
                $vendedor->save();
    
                //Asignamos el rol de vendedor
                $user->assignRole('vendedor');
    
                return redirect()->route('home')->with('success', 'Vendedor creado con éxito');

            }else if($request->tipouusuario == 'admin'){
                $administrador = new User();
                $administrador->name = $request->nombre . ' ' . $request->apellido;
                $administrador->username = $request->cedula;
                $administrador->email = $request->email;
                $administrador->password = bcrypt($request->cedula);
                $administrador->save();

                $administrador->assignRole('admin');

                return redirect()->route('home')->with('success', 'Administrador creado con éxito');
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('modules.admin.create.vendedores')->with('error', 'Error al crear vendedor');
        }

    }

    public function cambioContrasena(Request $request)
    {
      \Log::info("Cambiando contraseña");
      try {
        \Log::info("Cambiando contraseña");
          if($request->password != $request->password_confirmation){
              return redirect()->back()->with('error', 'Las contraseñas no coinciden');
          }else{
              $user = Auth::user();
              $user->password = Hash::make($request->password);
              $user->passwordchanged = 1;
              $user->save();
              return redirect()->route('home');
          }        
      } catch (\Exception $e) {
        \Log::error('Error al cambiar la contraseña: ' . $e->getMessage());
        return response()->json(['message' => 'Error al cambiar contraseña'], 500);
      }
    }

    public function cambioTelefono(Request $request){
        try {
            $user = Auth::user();
            $tendero = Tendero::where('user_id', $user->id)->first();
            $tendero->telefono = $request->telefono;
            $tendero->save();
            
            return redirect()->route('home');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('home');
        }
    }

    public function verTerminos() {
        $user = auth()->user();
        $showMenu = $user->terms == 1 || $user->hasRole('vendedor');
        $showForm = $user->terms == 0 && $user->hasRole('tendero');


        return view('modules.terminos', compact('showMenu', 'showForm'));
    }

    public function aceptarTerminos(Request $request)
    {
        $user = auth()->user();
        
        // Cambiar el campo 'terms' de 0 a 1
        $user->terms = 1;
        $user->save();

        return redirect('/home')->with('success', 'Términos y condiciones aceptados correctamente.');
    }

    public function reestablecerPassVendedor()

    
}