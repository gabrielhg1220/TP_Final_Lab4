<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - LISTA COMISIONES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">Listado de las Comisiones</h1>

    <!-- Agrega una linea en blano -->
    <br>

    <a href="{{ route('commissions.create') }}" class="btn btn-success mb-3">Agregar Comisión</a>

    <!-- Agrega dos lineas en blanco -->
    <br> <br>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('commissions.index') }}">
        <div class="row">
            <div class="col-md-4">
                <select class="form-control" name="curso">
                    <option value="">Seleccionar curso</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ request('curso') == $course->id ? 'selected' : '' }}>{{ $course->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="horario" placeholder="Buscar por horario" value="{{ request('horario') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <br><br>

    <div class="opacity-75">
        <table border="1" class="table table-secondary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aula</th>
                    <th>Horario</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($commissions as $commission)
                <tr>
                    <td>{{ $commission->id }}</td>
                    <td>{{ $commission->aula }}</td>
                    <td>{{ $commission->horario }}</td>
                    <td>{{ $commission->course->nombre }}</td>
                    <td>
                        <a href="{{ route('commissions.edit', $commission) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('commissions.destroy', $commission) }}" method="POST" class="d-inline">
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
