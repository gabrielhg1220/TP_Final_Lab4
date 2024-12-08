<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - REPORTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  </head>

  <body class="fondo">

    <div class="container">
        <h1 class="titulo">Asignar Comisiones a {{ $professor->nombre }}</h1>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('professors.assign.store', $professor->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="commissions" class="etiqueta2">Selecciona las comisiones:</label>
                <select name="commissions[]" id="commissions" class="form-control" multiple>
                    @foreach($commissions as $commission)
                        <option value="{{ $commission->id }}"
                            {{ $professor->commissions->contains($commission->id) ? 'selected' : '' }}>
                            Aula: {{ $commission->aula }} - Horario: {{ $commission->horario }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <a href="{{ route('professors.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>