<?php

namespace App\Http\Controllers;

use App\Exports\AnimalExport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB; //trabajar con BD usando SP
use Illuminate\Http\Request; // Recuperar datos de la vista
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class AnimalController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            $animales = DB::select('CALL spsel_animal()');
            return DataTables::of($animales)
            ->addColumn('action', function($animales){
                $acciones = '<a href="javascript:void(0)" onclick="editarAnimal('.$animales->id.')" class="btn btn-info btn-sm"> Editar </a>';
                $acciones .= '&nbsp;<button type="button" name="delete" id="'.$animales->id.'" class="delete btn-danger btn-sm"> eliminar </button>';
                return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('animal.index');
    }


    public function registrar(Request $request){
        //llamar al procedimiento almacenado
        $animal = DB::select('CALL spcre_animal(?, ?, ?)', 
        [$request->nombre, $request->especie, $request->genero]);
        return back();

    } 

    public function eliminar($id){
        //llamar al procedimiento almacenado
        $animal = DB::select('CALL spdel_animal(?)', [$id]);
        return back();
    } 

    public function editar($id){
        //llamar al procedimiento almacenado
        $animal = DB::select('CALL spseledit_animal(?)', [$id]);
        return response()->json($animal);
 
    } 

    public function actualizar(Request $request){
        $animal = DB::select('CALL spupd_animal(?, ?, ?, ?)', 
        [$request->id, $request->nombre, $request->especie, $request->genero]);
        return back();
    } 

    public function export() 
{
    return Excel::download(new AnimalExport, 'animales.xlsx');
}
}
