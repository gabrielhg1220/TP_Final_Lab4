<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Estudiantes Inscritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    <h1>Reporte de Estudiantes Inscritos</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Cursos</th>
                <th>Comisiones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->nombre }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @foreach ($student->courses as $course)
                            {{ $course->nombre }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($student->courses as $course)
                            @foreach ($course->commissions as $commission)
                                {{ $commission->aula }} - {{ $commission->horario }}<br>
                            @endforeach
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>