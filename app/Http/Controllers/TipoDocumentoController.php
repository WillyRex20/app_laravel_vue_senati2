<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
    public function ListarProductos(){
        //select * from v_producto;
        //$tipodocumentos = TipoDocumento::all();
        $tipodocumentos = TipoDocumento::where('estado',1)->get();
        //$tipodocumentos = TipoDocumento::all();
        //dd($tipodocumentos);
        //var_dump($tipodocumentos);
        //print_r($tipodocumentos);
        //imprimir en json
        return response()->json($tipodocumentos);
    }
}
