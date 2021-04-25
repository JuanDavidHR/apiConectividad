<?php namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $rol = Rol::all();
        return response()->json($rol, 200);
    }


    public function getRol($id)
    {
        $rol = Rol::find($id);
        if($rol)
        {
            return response()->json($rol, 200);
        }

        return response()->json(["rol no encontrado"], 404);

    }

    public function createRol(Request $request)
    {
        $rol = new Rol;  
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->vigencia = $request->vigencia;
        $rol->save();
        return response()->json($rol);  
    }

    public function updateRol(Request $request,$id)
     { 

        $rol= Rol::find($id);
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->vigencia = $request->vigencia;
        $rol->save();
        return response()->json($rol);
     }

     public function destroyRol($id)
     {
        $rol = Rol::find($id);
        $rol->delete();
         return response()->json('El rol fue eliminada');
     }
}
