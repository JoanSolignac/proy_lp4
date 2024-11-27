@extends("layouts.admin")

@section("content")

    <div class="container mt-4" style="max-width: 100%;">
        <h2 class="mb-4" style="font-size: 1.5rem;">Lista de Empleados</h2>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('empleados.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-8">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Buscar empleado por nombre o DNI" 
                        value="{{ request('search') }}" 
                    />
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i> Buscar
                    </button>
                </div>
            </div>
        </form>


        <!--Tabla de Empleados-->
        <table class="table table-striped table-hover table-sm" style="font-size: 0.8rem;"> <!-- Tamaño reducido -->
            <thead class="table-dark">
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 15%;">Nombre</th>
                    <th style="width: 5%;">DNI</th>
                    <th style="width: 10%;">Teléfono</th>
                    <th style="width: 10%;">Rol</th>
                    <th style="width: 5%;">Estado</th>
                    <th style="width: 10%;">Hora Entrada</th>
                    <th style="width: 10%;">Hora Salida</th>
                    <th style="width: 10%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre_apellido }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->rol }}</td>
                    <td>
                        <span class="badge bg-{{ $empleado->estado == 'activo' ? 'success' : 'danger' }}">
                            {{ ucfirst($empleado->estado) }}
                        </span>
                    </td>
                    <td>{{ $empleado->hora_entrada }}</td>
                    <td>{{ $empleado->hora_salida }}</td>
                    <td>
                        <!-- Botón Mostrar -->
                        <button class="btn btn-sm btn-primary" title="Mostrar">
                            <i class="fa fa-eye"></i> <!-- Icono de "Mostrar" -->
                        </button>

                        <!-- Botón Editar -->
                        <button class="btn btn-sm btn-warning" title="Editar">
                            <i class="fa fa-edit"></i> <!-- Icono de "Editar" -->
                        </button>

                        <!-- Botón Eliminar -->
                        <button class="btn btn-sm btn-danger" title="Eliminar" onclick="alert('Acción Eliminar no implementada')">
                            <i class="fa fa-trash"></i> <!-- Icono de "Eliminar" -->
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-justify mt-4 mx-3">
            {{ $empleados->links('pagination::bootstrap-5') }}
        </div>

    </div>

@endsection