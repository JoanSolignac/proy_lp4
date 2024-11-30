@extends("layouts.admin")

@section("content")

    <div class="container mt-4" style="max-width: 100%;">
        <h2 class="mb-4 text-center" style="font-size: 2.5rem;">Lista de Empleados</h2>

        <!-- Formulario de búsqueda -->
        <div class="container-fluid d-flex justify-content-center align-items-center mb-4">
            <form method="GET" action="{{ route('empleados.index') }}" class="w-50">
                <div class="row">
                    <div class="col-12 col-md-8 mb-3 mb-md-0">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control w-100" 
                            placeholder="Buscar empleado por nombre o DNI" 
                            value="{{ request('search') }}" 
                        />
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fa fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>



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
                        <!-- Botón Mostrar -->
                        <a href="{{ route('empleados.show', $empleado) }}" class="btn btn-sm btn-primary" title="Mostrar">
                            <i class="fa fa-eye"></i>
                        </a>

                        <!-- Botón para Editar -->
                        <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-sm btn-warning" title="Editar">
                            <i class="fa fa-edit"></i> <!-- Icono de "Editar" -->
                        </a>

                        <!-- Botón Eliminar con Formulario -->
                        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">
                                <i class="fa fa-trash"></i> <!-- Icono de "Eliminar" -->
                            </button>
                        </form>

                        
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