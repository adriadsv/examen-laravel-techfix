<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('equipos.index') }}">TechFix</a>
    </div>
</nav>

<div class="container mt-4">
    <h1 class="h3 mb-3">Nuevo Equipo</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipos.store') }}" method="POST" class="card card-body">
        @csrf

       <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input
                type="text"
                name="telefono"
                class="form-control"
                value="{{ old('telefono') }}"
                inputmode="numeric"
                pattern="[0-9]{10}"
                minlength="10"
                maxlength="10"
                title="Solo números de 10 dígitos"
                required
            >
        </div>


        <div class="mb-3">
            <label class="form-label">Marca/Modelo</label>
            <input type="text" name="marca_modelo" class="form-control" value="{{ old('marca_modelo') }}" required>
        </div>

        
            <div class="mb-3">
                <label class="form-label">Tipo de equipo</label>
                <input
                    type="text"
                    name="tipo_equipo"
                    class="form-control"
                    value="{{ old('tipo_equipo') }}"
                    required
                >
            </div>

        <div class="mb-3">
            <label class="form-label">Problema reportado</label>
            <textarea name="problema_reportado" class="form-control" rows="3" required>{{ old('problema_reportado') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del cliente</label>
            <input type="text" name="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado }}" @selected(old('estado','recibido') === $estado)>
                        {{ ucfirst($estado) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
</body>
</html>

