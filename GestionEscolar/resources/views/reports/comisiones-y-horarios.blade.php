<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Comisiones y Horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    
    <div class="container mt-5">
        <h1 class="mb-4">Reporte de Comisiones y Horarios</h1>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Curso</th>
                            <th>Materia</th>
                            <th>Aula</th>
                            <th>Horario</th>
                            <th>Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commissions as $commission)
                            <tr>
                                <td>{{ $commission->id }}</td>
                                <td>{{ $commission->course->nombre }}</td>
                                <td>{{ $commission->course->subject->nombre }}</td>
                                <td>{{ $commission->aula }}</td>
                                <td>{{ $commission->horario }}</td>
                                <td>{{ $commission->professor ? $commission->professor->nombre : 'No asignado' }}</td>
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