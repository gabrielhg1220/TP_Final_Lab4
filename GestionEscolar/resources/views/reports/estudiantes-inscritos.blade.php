<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Estudiantes Inscritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print{
            .no-print{
                display: none;
            }
        }
    </style>
</head>

  <body>
    <div class="container mt-5">
        <h1 class="mb-4">Reporte de Estudiantes Inscritos</h1>
        
        <div class="mb-3">
            <a href="{{ route('reports.estudiantesInscritosPDF') }}" class="btn btn-success">
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->nombre }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    @foreach($student->courses as $course)
                                        <strong>{{ $course->nombre }}</strong><br>
                                        @foreach($course->commissions as $commission)
                                            - Comisión: {{ $commission->aula }} ({{ $commission->horario }})<br>
                                        @endforeach
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>