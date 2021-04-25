<?php namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::all();
        return response()->json($area, 200);
    }


    public function getArea($id)
    {
        $area = Area::find($id);
        if($area)
        {
            return response()->json($area, 200);
        }

        return response()->json(["Area no encontrado"], 404);

    }

    public function createArea(Request $request)
    {
        $area = new Area;  
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->vigencia = $request->vigencia;
        $area->save();
        return response()->json($area);  
    }

    public function updateArea(Request $request,$id)
     { 

        $area= Area::find($id);
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->vigencia = $request->vigencia;
        $area->save();
        return response()->json($area);
     }

     public function destroyArea($id)
     {
        $area = Area::find($id);
        $area->delete();
         return response()->json('El area fue eliminada');
     }
}
