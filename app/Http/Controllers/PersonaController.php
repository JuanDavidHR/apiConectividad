<?php namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

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
            ->join('area', 'users.idArea', '=', 'area.idArea')
            ->join('rol', 'users.idRol', '=', 'rol.idRol')
            ->select('personas.idPersona', 'personas.nombre', 'personas.tipo_documento',
            'personas.num_documento', 'personas.direccion', 'personas.telefono',
            'users.email', 'users.password', 'users.vigencia', 'users.idRol', 'rol.nombre as rol',
            'personas.idTipo', 'tipo.nombre as Tipo de Persona','personas.idArea', 'area.nombre as Area de Policia')
            ->orderBy('personas.idPersona', 'desc')
            ->paginate(5);
        }
        else{
            $personas = User::join('personas', 'users.idPersona', '=', 'personas.idPersona')
            ->join('tipo', 'personas.idTipo', '=', 'tipo.idTipo')
            ->join('area', 'personas.idArea', '=', 'area.idArea')
            ->join('rol', 'users.idRol', '=', 'rol.idRol')
            ->select('personas.idPersona', 'personas.nombre', 'personas.tipo_documento',
            'personas.num_documento', 'personas.direccion', 'personas.telefono',
            'users.email', 'users.password', 'users.vigencia', 'users.idRol', 'rol.nombre as rol',
            'personas.idTipo', 'tipo.nombre as Tipo de Persona','personas.idArea', 'area.nombre as Area de Policia')
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

    public function store(UserStoreRequest $request)
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
            $personas->save();
            $user =  new User();
            $user->email = $request->usuario;
            $user->password = bcrypt($request->password);
            $user->vigencia = '1';
            $user->idRol = $request->idRol;
            $user->id = $persona->id;
            $user->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        
    }
}
