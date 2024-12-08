<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - LISTA MATERIAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
  
  <body class="fondo">
    <h1 class="titulo">Lista de las Materias</h1>

    <!-- Agrega una linea en blano -->
    <br>

    <div class="mb-3">
        <a href="{{ route('subjects.create') }}" class="btn btn-success mb-3">
            Agregar Materia
        </a>

        <a href="{{ url('/') }}" class="btn btn-warning mb-3">
            Volver al inicio
        </a>
    </div>

    

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="opacity-75">
        <table border="1" class="table table-success">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->nombre }}</td>
                    <td>
                        <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
