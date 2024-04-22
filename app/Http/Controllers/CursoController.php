<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cursos = Curso::all();
        $cursos = DB::table('_cursos')->get();
        return view('cursos.index', ['cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = DB::table ('_cursos')
        ->orderBy('id')
        ->get();
        return view('cursos.new', ['cursos' => $cursos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Asignar valores a los campos del curso
        $curso = new Curso();

        $curso->Nombre = $request->name;
        $curso->Descripción = $request->descripción;
        $curso->Duración = $request->duración;

        // Guardar el nuevo curso en la base de datos
        $curso->save();

        // Redirigir al usuario a la página de índice de cursos
        return redirect()->route('cursos.index');

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
       $curso = Curso::find($id);
       $cursos=DB::table('_cursos')
       ->orderBy('name')
       ->get();
       return view ('cursos.edit', ['curso' => $curso, 'cursos' => $cursos]);
    }
    /**
     * Update the specified resource in storag
     * e.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        $curso->Nombre = $request->name;
        $curso->Descripción = $request->descripción;
        $curso->Duración = $request->duración;
        $curso->save();
    
        $cursos = DB::table('_cursos')
        ->orderBy('name')
        ->get();

        // Redirigir al usuario a la página de índice de cursos
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        $cursos = DB::table('_cursos')->get();
        return view('cursos.index', ['cursos' => $cursos]);
    }
}
