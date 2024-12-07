<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - LISTA ESTUDIANTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
  
  <body class="fondo">
    <h1 class="titulo">Listado de Estudiantes</h1>
    
    <div class="mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-success mb-3">
            Agregar Estudiante
        </a>

        <a href="{{ url('/') }}" class="btn btn-warning mb-3">
            Volver al Inicio
        </a>
    </div>    

    <!-- Agrega dos lineas en blanco -->
    <br>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('students.index') }}">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre" value="{{ request('nombre') }}">
            </div>

            <div class="col-md-4">
                <select class="form-control" name="curso">
                    <option value="">Seleccionar curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ request('curso') == $curso->id ? 'selected' : '' }}>{{ $curso->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Agregar una linea en blanco -->
    <br><br>

    <div class="opacity-75">
        <table border="1" class="table table-success">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->nombre }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-info btn-sm">Editar</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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