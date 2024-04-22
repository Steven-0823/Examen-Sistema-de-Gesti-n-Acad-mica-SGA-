<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Inscripción</title>
</head>
<body>
    <x-app-layout>
<div class="container">
    <h1>Edit Inscripción</h1>
    <form method="POST" action="{{ route('inscripciones.update', ['inscripcion' => $inscripcion->id]) }}">

        @method('put')
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                   disabled="disabled" value="{{ $inscripcion->id }}">
            <div id="idHelp" class="form-text">ID Inscripción</div>
        </div>

        <div class="mb-3">
            <label for="estudiante_id" class="form-label">ID Estudiante</label>
            <input type="text" required class="form-control" id="estudiante_id" placeholder="ID Estudiante"
                   name="estudiante_id" value="{{ $inscripcion->estudiante_id }}">
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">ID Curso</label>
            <input type="text" required class="form-control" id="curso_id" placeholder="ID Curso"
                   name="curso_id" value="{{ $inscripcion->curso_id }}">
        </div>

        <div class="mb-3">
            <label for="fecha_inscripcion" class="form-label">Fecha de inscripción</label>
            <input type="date" required class="form-control" id="fecha_inscripcion"
                   name="fecha_inscripcion" value="{{ $inscripcion->fecha_inscripcion }}">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('inscripciones.index') }}" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</div>

</x-app-layout>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
