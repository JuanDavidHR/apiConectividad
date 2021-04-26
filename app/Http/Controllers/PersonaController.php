<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use App\Http\Requests\UserStoreRequest;
class PersonaController extends Controller
{
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar==''){
            $personas = User::join('personas', 'users.idPersona', '=', 'personas.idPersona')
            ->join('tipo', 'personas.idTipo', '=', 'tipo.idTipo')
            ->leftjoin('area', 'personas.idArea', '=', 'area.idArea')
            ->join('rol', 'users.idRol', '=', 'rol.idRol')
            ->select('personas.idPersona', 'personas.nombre', 'personas.tipo_documento',
            'personas.num_documento', 'personas.direccion', 'personas.telefono',
            'users.email', 'users.password', 'users.vigencia', 'users.idRol', 'rol.nombre as rol',
            'personas.idTipo', 'tipo.nombre as Tipo de Persona','personas.idArea', 'area.nombre as Area de Policia','personas.placa')
            ->orderBy('personas.idPersona', 'desc')
            ->paginate(5);
        }
        else{
            $personas = User::join('personas', 'users.idPersona', '=', 'personas.idPersona')
            ->join('tipo', 'personas.idTipo', '=', 'tipo.idTipo')
            ->leftjoin('area', 'personas.idArea', '=', 'area.idArea')
            ->join('rol', 'users.idRol', '=', 'rol.idRol')
            ->select('personas.idPersona', 'personas.nombre', 'personas.tipo_documento',
            'personas.num_documento', 'personas.direccion', 'personas.telefono',
            'users.email', 'users.password', 'users.vigencia', 'users.idRol', 'rol.nombre as rol',
            'personas.idTipo', 'tipo.nombre as Tipo de Persona','personas.idArea', 'area.nombre as Area de Policia','personas.placa')
            ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('personas.idPersona', 'desc')
            ->paginate(5);
        }
        
        return [
            'pagination' => [
                'total'        => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page'     => $personas->perPage(),
                'last_page'    => $personas->lastPage(),
                'from'         => $personas->firstItem(),
                'to'           => $personas->lastItem(),
            ],
            'personas' => $personas
        ];
    }



    public function getPersona($id)
    {
        $personas = Persona::find($id);
        if($personas)
        {
            return response()->json($personas, 200);
        }

        return response()->json(["Persona no encontrada"], 404);

    }

    public function store(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();
            $personas = new Persona();
            $personas->nombre = $request->nombre;
            $personas->apellidos = $request->apellidos;
            $personas->tipo_documento = $request->tipo_documento;
            $personas->num_documento = $request->num_documento;
            $personas->direccion = $request->direccion;
            $personas->telefono = $request->telefono;
            $personas->idTipo = '1';
            if($request->idTipo=='2'){
                $personas->idTipo = $request->idTipo;
                $personas->placa = $request->placa;
                $personas->idArea = $request->idArea;
            }
            $personas->save();
            $users =  new User();
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->vigencia = '1';
            $users->idRol = $request->idRol;
            $users->idPersona = $personas->idPersona;
            $users->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        
    }

    public function update(UserUpdateRequest $request)
    {
        //if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $personas->nombre = $request->nombre;
            $personas->apellidos = $request->apellidos;
            $personas->tipo_documento = $request->tipo_documento;
            $personas->num_documento = $request->num_documento;
            $personas->direccion = $request->direccion;
            $personas->telefono = $request->telefono;
            $personas->idTipo = '1';
            if($request->idTipo=='2'){
                $personas->idTipo = $request->idTipo;
                $personas->placa = $request->placa;
                $personas->idArea = $request->idArea;
            }
            $personas->save();
            $users =  new User();
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->vigencia = '1';
            $users->idRol = $request->idRol;
            $users->idPersona = $personas->idPersona;
            $users->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    public function desactivar(Request $request)
    {
        //if(!$request->ajax()) return redirect('/');
        $users = User::findOrFail($request->idPersona);//accedemos a cada una de las propiedades
        $users->vigencia = '0';
        $users->save();
    }

    public function activar(Request $request)
    {
        //if(!$request->ajax()) return redirect('/');
        $users = User::findOrFail($request->idPersona);//accedemos a cada una de las propiedades
        $users->vigencia = '1';
        $users->save();
    }
}
