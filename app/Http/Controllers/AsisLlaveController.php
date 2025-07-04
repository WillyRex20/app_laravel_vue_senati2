<?php

namespace App\Http\Controllers;

use App\Models\AsisLlave;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AsisLlaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$llaves = AsisLlave::all();
        //return response()->json($llaves);
        $llaves = DB::select('select * from asis_llave a 
        left join users u on u.id = a.usuario_registra order by a.id_llave desc');
        return Inertia::render('configuracion/AsisLlaves', [
            'llaves' => $llaves,
            'estudiante' => [
                'nombre' => 'Williams Rodrigo',
                'institucion' => 'SENATI',
            ],
            'datos_academicos' => [
                'escuela' => 'Tupac Amaru II' ,
                'colegio' => 'Florentino Ameguino',
                
            ],
            'flash' =>[
                'success' => session('success'),
                'error' => session('error'),
            ],
        ]);
        
    }


    public function llavepdf(){
        $llaves = AsisLlave::all();
        $pdf = \PDF::loadView('pdf.llaves_pdf', compact('llaves'));
        return $pdf->stream('llaves.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validador = $request->validate([
            'codigo' => 'required',
            'disponible' => 'required',
            'estado' => 'required',
            'orden' => 'required',
        ]);

        $validador['usuario_registra'] = Auth::id();

        AsisLlave::create($validador);
        return Redirect::route('configuracion.llaves')->with('success', 'Llave creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_llave)
    {
        $validador = $request->validate([
            'codigo' => 'required',
            'disponible' => 'required',
            'estado' => 'required',
            'orden' => 'required',
        ]);

        $validador['usuario_actualiza'] = Auth::id();

        
        $llave = AsisLlave::findOrFail($id_llave);
        $llave->update($validador);
        return Redirect::route('configuracion.llaves')->with('success', 'Llave actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $llave = AsisLlave::find($id);
        $llave->delete();
        return Redirect::route('configuracion.llaves')
        ->with('success', 'Llave eliminada correctamente');
    }   
}
