<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - INSCRIPCIONES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Agregar una Nueva Inscripccion</h1>

    <!-- Agrega una linea en blano -->
    <br>

    <form action="{{ route('course_student.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Estudiante</label>
            <select name="student_id" id="student_id" class="form-control" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Agrega dos linea en blano -->
        <br> <br>

        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Agrega dos linea en blano -->
        <br> <br>

        <div class="mb-3">
            <label for="commission_id" class="form-label">Comisión</label>
            <select name="commission_id" id="commission_id" class="form-control" required>
                @foreach ($commissions as $commission)
                    <option value="{{ $commission->id }}">{{ $commission->aula }} ({{ $commission->horario }})</option>
                @endforeach
            </select>
        </div>

        <!-- Agrega dos linea en blano -->
        <br> <br>

        <button type="submit" class="btn btn-success">Guardar</button>
        
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
