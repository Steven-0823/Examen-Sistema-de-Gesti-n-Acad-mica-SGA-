<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use  Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$estudiantes = Estudiante::all();
        return view('estudiantes.index', ['estudiantes' => $estudiantes]);*/
        $estudiantes = DB::table('_estudiantes')->get();

        return view('estudiantes.index', ['estudiantes' => $estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = DB::table('_estudiantes')
        ->orderBy('id')
        ->get();
        return view('estudiantes.new',['estudiantes' => $estudiantes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $estudiante = new Estudiante();

    // Asignar valores a los campos del estudiante
    $estudiante->name = $request->name;
    $estudiante->apellido = $request->apellido;
    $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
    $estudiante->email = $request->email;

    // Guardar el nuevo estudiante en la base de datos
    $estudiante->save();

    // Redirigir al usuario a la página de índice de estudiantes
    return redirect()->route('estudiantes.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
