<?php namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function index()
    {
        $tipo = Tipo::all();
        return response()->json($tipo, 200);
    }


    public function getTipo($id)
    {
        $tipo = Tipo::find($id);
        if($rol)
        {
            return response()->json($tipo, 200);
        }

        return response()->json(["Tipo no encontrado"], 404);

    }

    public function createTipo(Request $request)
    {
        $tipo = new Tipo;  
        $tipo->nombre = $request->nombre;
        $tipo->descripcion = $request->descripcion;
        $tipo->vigencia = $request->vigencia;
        $tipo->save();
        return response()->json($tipo);  
    }

    public function updateTipo(Request $request,$id)
     { 

        $tipo= Tipo::find($id);
        $tipo->nombre = $request->nombre;
        $tipo->descripcion = $request->descripcion;
        $tipo->vigencia = $request->vigencia;
        $tipo->save();
        return response()->json($tipo);
     }

     public function destroyTipo($id)
     {
        $tipo = Tipo::find($id);
        $tipo->delete();
         return response()->json('El tipo fue eliminada');
     }
}
