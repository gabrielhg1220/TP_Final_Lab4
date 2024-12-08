<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Asistencia de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    
    <div class="container mt-5">
        <h1 class="mb-4">Reporte de Asistencia de Profesores</h1>

        <div class="mb-3">
            <a href="{{ route('reports.asistenciaProfesoresPDF') }}" class="btn btn-success">
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

        <div class="card">
            <div class="card-body">
                @foreach($professors as $professor)
                    <h3 class="mt-4">Profesor: {{ $professor->nombre }}</h3>
                    @if($professor->commissions->isEmpty())
                        <p class="text-muted">No tiene comisiones asignadas.</p>
                    @else
                        <table class="table table-striped mt-2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Curso</th>
                                    <th>Materia</th>
                                    <th>Aula</th>
                                    <th>Horario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($professor->commissions as $commission)
                                    <tr>
                                        <td>{{ $commission->id }}</td>
                                        <td>{{ $commission->course->nombre }}</td>
                                        <td>{{ $commission->course->subject->nombre }}</td>
                                        <td>{{ $commission->aula }}</td>
                                        <td>{{ $commission->horario }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>