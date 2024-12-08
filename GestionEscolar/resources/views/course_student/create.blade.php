<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - NUEVA INSCRIPCION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Nueva Inscripción</h1>

    <!-- Agrega una linea en blano -->
    <br>    
        
    <form action="{{ route('course_student.store') }}" method="POST">
        @csrf
    
        <!-- Selección del estudiante -->
        <div class="mb-3">
            <label for="student_id" class="form-label etiqueta1">Estudiante</label>
            <select name="student_id" id="student_id" class="form-select" required>
                <option value="" disabled selected>Seleccione un estudiante</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->nombre }}</option>
                @endforeach
            </select>
        </div>
    
        <!-- Selección del curso -->
        <div class="mb-3">
            <label for="course_id" class="form-label etiqueta1">Curso</label>
            <select name="course_id" id="course_id" class="form-select" required>
                <option value="" disabled selected>Seleccione un curso</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                @endforeach
            </select>
        </div>
    
        <!-- Selección de la comisión -->
        <div class="mb-3">
            <label for="commission_id" class="form-label etiqueta1">Comisión</label>
            <select name="commission_id" id="commission_id" class="form-select" required>
                <option value="" disabled selected>Seleccione una comisión</option>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}">
                        Aula: {{ $commission->aula }} - Horario: {{ $commission->horario }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <!-- Botones -->
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('course_student.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
