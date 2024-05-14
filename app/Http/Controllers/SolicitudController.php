<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use App\Http\Controllers\Admin\HomeController;
use App\Mail\ContactanosMailable;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Solicitud::paginate(15);
        return view('gestor',['datos'=>$datos]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //$datosEmpleado = request()->all();
        $request->validate([
            'DNI' => ['required','min:8','numeric'],
            'Nombre' => ['required','min:2'],
            'Apellido' => ['required','min:4'],
            'Celular' => ['required','min:9','numeric'],
            'Correo' => ['required'],
            'Direccion' => 'required',
            'TipoSol' => 'required',
            'Curso' => 'required'
        ], [],  [
            'DNI' => 'DNI',
        ]);

        $datosEmpleado = request()->except('_token');
        Solicitud::insert($datosEmpleado);
        return view('inicio', ['correctS' => 'ok']);

        //return redirect()->away('http://127.0.0.1/miWordPress');
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Solicitud::destroy($id);
        return redirect('gestor')->with('eliminarF','ok');
    }
}
