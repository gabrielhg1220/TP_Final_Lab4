<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - INSCRIPCION DE ESTUDIANTE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

  <body class="fondo">
    <h1>Inscripciones de Estudiantes</h1>

    <!-- Agrega una linea en blano -->
    <br>

    <div class="mb-3">
        <a href="{{ route('course_student.create') }}" class="btn btn-success mb-3">
            Nueva Inscripción
        </a>

        <a href="{{ url('/') }}" class="btn btn-warning mb-3">
            Volver al Inicio
        </a>
    </div>

    <!-- Agrega dos lineas en blanco -->
    <br>    

    <div class="opacity-75">
        <table border="1" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Comisión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        <td>{{ $inscription->id }}</td>
                        <td>{{ $inscription->student->nombre }}</td>
                        <td>{{ $inscription->course->nombre }}</td>
                        <td>{{ $inscription->commission->aula }} ({{ $inscription->commission->horario }})</td>
                        <td>
                            <a href="{{ route('course_student.edit', $inscription->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('course_student.destroy', $inscription->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
