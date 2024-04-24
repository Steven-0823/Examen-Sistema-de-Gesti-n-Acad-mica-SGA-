<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Estudiantes</title>
  </head>
  <body>
    <x-app-layout>
    <div class="container">
    <h1>Listado de estudiantes</h1>
<a href="{{route('estudiantes.create')}}" class="btn btn-success">Add Estudiante</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Fecha de nacimiento</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($estudiantes as $estudiante)
            
      
        <tr>
          <th scope="row">{{$estudiante->id}}</th>
          <td>{{$estudiante->name}}</td>
          <td>{{$estudiante->apellido}}</td>
          <td>{{$estudiante->fecha_nacimiento}}</td>
          <td>{{$estudiante->email}}</td>
          <td>
            <a href="{{route('estudiantes.edit', ['estudiantes' => $estudiante->id])}}"
              class="btn btn-info">edit</a></li>
            <form action="{{route('estudiantes.destroy',['estudiantes' => $estudiante->id])}}"
            method="POST" style="display: inline-block">
            @method('delete')
            @csrf
            <input class="btn btn-danger" type="submit" value="Delete">
          </form></td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
    </div>
  </x-app-layout>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>