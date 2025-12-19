<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">TechFix</span>
    </div>
</nav>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Equipos</h1>
        <a href="{{ route('equipos.create') }}" class="btn btn-primary">Nuevo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Tipo</th>
                <th>Marca/Modelo</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Ingreso</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->tipo_equipo }}</td>
                    <td>{{ $equipo->marca_modelo }}</td>
                    <td>{{ $equipo->nombre_cliente }}</td>
                    <td>{{ $equipo->telefono }}</td>
                    <td class="text-capitalize">{{ $equipo->estado }}</td>
                    <td>{{ $equipo->created_at->format('d/m/Y H:i') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay equipos registrados.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
