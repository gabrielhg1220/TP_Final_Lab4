<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - EDITAR ALUMNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Editar Informacion de Estudiante</h1>

    <!-- Agregar una linea en blanco -->
    <br>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 etiqueta1">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $student->nombre }}" required>
        </div>
        
        <!-- Agregar una linea en blanco -->
        <br>

        <div class="mb-3 etiqueta1">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-success mb-3">Actualizar</button>

          <a href="{{ url()->previous() }}" class="btn btn-warning mb-3">
            Volver
          </a>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
