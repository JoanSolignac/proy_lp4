@extends("layouts.admin")

@section("content")
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Modificar Empleado</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('empleados.update', $empleado) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Mensajes de error --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Campo: Nombre y Apellido --}}
                            <div class="mb-3">
                                <label for="nombre_apellido" class="form-label">Nombre y Apellido</label>
                                <input type="text" class="form-control rounded-pill" name="nombre_apellido" value="{{ $empleado->nombre_apellido }}" required>
                            </div>

                            {{-- Campo: DNI --}}
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control rounded-pill" name="dni" value="{{ $empleado->dni }}" required>
                            </div>

                            {{-- Campo: Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control rounded-pill" name="email" value="{{ $empleado->email }}" required>
                            </div>

                            {{-- Campo: Teléfono --}}
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control rounded-pill" name="telefono" value="{{ $empleado->telefono }}">
                            </div>

                            {{-- Campo: Dirección --}}
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control rounded-pill" name="direccion" value="{{ $empleado->direccion }}">
                            </div>

                            {{-- Campo: Rol --}}
                            <div class="mb-3">
                                <label for="rol" class="form-label W-100">Rol</label>
                                <select class="form-select rounded-pill" name="rol" required>
                                    @php
                                        $roles = [
                                            "Seguridad", "Recepcionista", "Supervisor", "Cocinera", 
                                            "Contador", "Cajero", "Limpieza", "Mantenimiento", 
                                            "Almacenista", "Reposteros"
                                        ];
                                    @endphp
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}" {{ $empleado->rol == $role ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Campo: Estado --}}
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select rounded-pill W-100" name="estado" required>
                                    <option value="activo" {{ $empleado->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ $empleado->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>

                            {{-- Campo: Hora de Entrada --}}
                            <div class="mb-3">
                                <label for="hora_entrada" class="form-label">Hora de Entrada</label>
                                <input type="time" class="form-control rounded-pill" name="hora_entrada" value="{{ $empleado->hora_entrada }}" required>
                            </div>

                            {{-- Campo: Hora de Salida --}}
                            <div class="mb-3">
                                <label for="hora_salida" class="form-label">Hora de Salida</label>
                                <input type="time" class="form-control rounded-pill" name="hora_salida" value="{{ $empleado->hora_salida }}" required>
                            </div>

                            {{-- Botones --}}
                            <div class="d-flex justify-content-end gap-3">
                                <a href="{{ route('empleados.index') }}" class="btn btn-secondary mx-3">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
