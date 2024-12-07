<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Cursos por Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    <div class="container mt-5">
        <h1 class="mb-4">Reporte de Cursos por Materia</h1>

        <div class="mb-3">
            <a href="{{ route('reports.cursosPorMateriaPDF') }}" class="btn btn-success">
                Descargar PDF
            </a>

            <a href="{{ url()->previous() }}" class="btn btn-warning">
                Volver
            </a>

            <button class="btn btn-danger btn-block x-100" onclick="cerrarVentana()">
                Cerrar
            </button>
      
            <script>
                function cerrarVentana(){
                    window.close();
                }
            </script>
        </div>

        <br>

        <div class="card">
            <div class="card-body">
                @foreach($subjects as $subject)
                    <h3 class="mt-4">{{ $subject->nombre }}</h3>
                    <table class="table table-striped mt-2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Curso</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subject->courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->nombre }}</td>
                                    <td>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>