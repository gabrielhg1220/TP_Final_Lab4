<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - LISTA PROFESOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Listado de Profesores</h1>

    <!-- Agrega una linea en blano -->
    <br>

    <div class="mb-3">
        <a href="{{ route('professors.create') }}" class="btn btn-success mb-3">
            Agregar Profesor
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

    <div class="opacity-75">
        <table border="1" class="table table-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Comisiones</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->nombre }}</td>
                    <td>
                        @if ($professor->commissions->isNotEmpty())
                            <ul>
                                @foreach ($professor->commissions as $commission)
                                    <li>{{ $commission->aula }} - {{ $commission->horario }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">No tiene comisiones asignadas</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('professors.assign', $professor->id) }}" class="btn btn-sm btn-success">Asignar Comisiones</a>
                        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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
