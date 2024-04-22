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
    // Validar los datos del formulario
    $request->validate([
        'estudiante_id' => 'required|exists:_estudiantes,id',
        'curso_id' => 'required|exists:_cursos,id',
        'fecha_inscripcion' => 'required|date',
    ]);

    // Crear una nueva instancia de Inscripciones
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
        $estudiante = Estudiante::find($id);
        $estudiantes=DB::table('_estudiantes')
        ->orderBy('name')
        ->get();
        return view('estudiantes.edit',['estudiante' => $estudiante, 'estudiantes' => $estudiantes]);
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
        $estudiante = Estudiante::find($id);
        $estudiante->name = $request->name;
        $estudiante->apellido = $request->apellido;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->email = $request->email;
    
        // Guardar el estudiante actualizado en la base de datos
        $estudiante->save();
    
        // Redirigir al usuario a la página de índice de estudiantes
        return redirect()->route('estudiantes.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        $estudiantes = DB::table('_estudiantes')->get();
        return view('estudiantes.index',['estudiantes' => $estudiantes]);
    }
}
