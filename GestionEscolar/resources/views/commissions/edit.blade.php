<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - EDITAR COMISION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Editar Informacion de Comision</h1>

    <!-- Agrega una linea en blanco -->
    <br>

    <form action="{{ route('commissions.update', $commission) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 etiqueta1">
            <label for="aula" class="form-label">Aula</label>
            <input type="text" class="form-control" id="aula" name="aula" value="{{ $commission->aula }}" required>
        </div>

        <!-- Agrega una linea en blanco -->
        <br>

        <div class="mb-3 etiqueta1">
            <label for="horario" class="form-label">Horario</label>
            <input type="time" class="form-control" id="horario" name="horario" value="{{ $commission->horario }}" required>
        </div>

        <!-- Agrega una linea en blanco -->
        <br>

        <div class="mb-3 etiqueta1">

            <label for="course_id" class="form-label">Curso</label>
            
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $commission->course_id ? 'selected' : '' }}>
                        {{ $course->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Agrega una linea en blanco -->
        <br>

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
