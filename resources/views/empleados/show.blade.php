@extends("layouts.admin")

@section("content")

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-center">Información del Empleado</h4>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center mb-4 text-primary">{{ $empleado->nombre_apellido }}</h2>
                        <p><strong>DNI:</strong> {{ $empleado->dni }}</p>
                        <p><strong>Fecha de Nacimiento:</strong> {{ $empleado->fecha_nacimiento }}</p>
                        <p><strong>Email:</strong> {{ $empleado->email }}</p>
                        <p><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
                        <p><strong>Dirección:</strong> {{ $empleado->direccion }}</p>
                        <p><strong>Rol:</strong> {{ $empleado->rol }}</p>
                        <p><strong>Estado:</strong> 
                            <span class="badge bg-{{ $empleado->estado == 'activo' ? 'success' : 'danger' }}">
                                {{ ucfirst($empleado->estado) }}
                            </span>
                        </p>
                        <p><strong>Horario:</strong> {{ $empleado->hora_entrada }} - {{ $empleado->hora_salida }}</p>

                        @if($empleado->foto)
                            <div class="text-center mt-4">
                                <img src="{{ asset('storage/' . $empleado->foto) }}" alt="Foto de {{ $empleado->nombre_apellido }}" class="img-fluid rounded shadow-sm">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i> Regresar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection