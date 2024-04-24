<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripciones;
use App\Models\Curso;
use App\Models\Estudiante;
use  Illuminate\Support\Facades\DB;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = DB::table('_inscripciones')
    ->join('_estudiantes', '_inscripciones.estudiante_id', '=', '_estudiantes.id')
    ->join('_cursos', '_inscripciones.curso_id', '=', '_cursos.id')
    ->select('_inscripciones.*', '_estudiantes.name as nombre_estudiante', '_cursos.nombre as nombre_curso')
    ->get();

    
        return view('inscripciones.index', ['inscripciones' => $inscripciones]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $estudiantes = Estudiante::all();
    $cursos = Curso::all();
    return view('inscripciones.new', ['estudiantes' => $estudiantes, 'cursos' => $cursos]);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $inscripcion = new Inscripciones();

    // Asignar valores a los campos de la inscripción
    $inscripcion->estudiante_id = $request->estudiante_id;
    $inscripcion->curso_id = $request->curso_id;
    $inscripcion->fecha_inscripcion = $request->fecha_inscripcion;

    // Guardar la nueva inscripción en la base de datos
    $inscripcion->save();

    // Redirigir al usuario a la página de índice de inscripciones
    return redirect()->route('inscripciones.index')->with('success', 'Inscripción creada correctamente');
    
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
    $inscripcion = Inscripciones::find($id);
    $estudiantes = Estudiante::all(); // Suponiendo que tienes un modelo llamado 'Estudiante'
    $cursos = Curso::all(); // Suponiendo que tienes un modelo llamado 'Curso'
    return view('inscripciones.edit', ['inscripcion' => $inscripcion, 'estudiantes' => $estudiantes, 'cursos' => $cursos]);
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
    $inscripcion = Inscripciones::find($id);
    $inscripcion->estudiante_id = $request->estudiante_id;
    $inscripcion->curso_id = $request->curso_id;
    $inscripcion->fecha_inscripcion = $request->fecha_inscripcion;

    // Guardar la inscripción actualizada en la base de datos
    $inscripcion->save();

    // Redirigir al usuario a la página de índice de inscripciones
    return redirect()->route('inscripciones.index')->with('success', 'Inscripción actualizada correctamente');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscripcion = Inscripciones::find($id);
        $inscripcion->delete();
        $inscripciones = DB::table('_inscripciones')->get();
        return view('inscripciones.index', ['inscripciones' => $inscripciones]);
    }
}
