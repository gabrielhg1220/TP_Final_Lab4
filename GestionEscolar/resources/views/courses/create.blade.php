<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - AGREGAR CURSOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Agregar un Nuevo Curso</h1>

        <!-- Agrega una linea en blano -->
        <br>

        <form action="{{ route('courses.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label etiqueta1">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-3">
                <label for="subject_id" class="form-label etiqueta1">Materia</label>
                <select name="subject_id" id="subject_id" class="form-control" required>
                    <option value="">Seleccione una materia</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success mb-3">Guardar</button>

                <a href="{{ url()->previous() }}" class="btn btn-warning mb-3">
                    Volver
                </a>
            </div>
            
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
