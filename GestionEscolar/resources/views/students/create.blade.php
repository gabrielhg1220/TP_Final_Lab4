<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - AGREGAR ALUMNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Agregar un Nuevo Estudiante</h1>

    <!-- Agrega una linea en blano -->
    <br>
    
    <form action="{{ route('students.store') }}" method="POST">
      @csrf
      
      <div class="mb-3">
        <label class="etiqueta1">Nombre</label>
        <input type="text" name="nombre" required>
      </div>

      <!-- Agrega dos linea en blano -->
      <br>

      <div class="mb-3">
        <label class="etiqueta1">Email</label>
        <input type="text" name="email" required>
      </div>

      <!-- Agrega una linea en blano -->
      <br>

      <div class="mb-3">
        <button type="submit" class="btn btn-success mb-3" >Guardar</button>

        <a href="{{ url()->previous() }}" class="btn btn-warning mb-3">
          Volver
        </a>
      </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>