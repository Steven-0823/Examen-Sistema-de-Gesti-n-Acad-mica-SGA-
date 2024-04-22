<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cursos</title>
  </head>
  <body>
    <div class="container">
        <h1>Lista de cursos</h1>
        <a href="{{route('inscripciones.create')}}" class="btn btn-success">Add</a>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Id Estudiante</th>
            <th scope="col">Id Curso</th>
            <th scope="col">Fecha de inscripcion</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($inscripciones as $inscripcion)
          <tr>
            <th scope="row">{{$inscripcion->id}}</th>
            <td>{{$inscripcion->estudiante_id}}</td>
            <td>{{$inscripcion->curso_id}}</td>
            <td>{{$inscripcion->fecha_inscripcion}}</td>
            <td><span> Actions </span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>