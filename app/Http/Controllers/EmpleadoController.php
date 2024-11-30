<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $empleados = Empleado::when($search, function ($query, $search) {
            return $query->where('nombre_apellido', 'like', "{$search}%")
                        ->orWhere('dni', 'like', "{$search}%");
        })->paginate(10);

        return view('empleados.index', compact('empleados'));
    }

    public function create(){
        return view("empleados.create");
    }
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre_apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:8|unique:empleados,dni',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'required|string|max:30|unique:empleados,telefono',
            'direccion' => 'required|string|max:255',
            'rol' => 'required|string|max:100',
            'estado' => 'required|string|max:50',
            'hora_entrada' => 'required|date_format:H:i',  // Acepta solo horas y minutos (H:i)
            'hora_salida' => 'required|date_format:H:i',   // Acepta solo horas y minutos (H:i)
            'fecha_nacimiento' => 'required|date', // Validación de fecha
        ]);
    
        // Crear el empleado con la fecha de nacimiento como string (formato Y-m-d)
        Empleado::create([
            'nombre_apellido' => $request->nombre_apellido,
            'dni' => $request->dni,
            // Convertir la fecha de nacimiento a formato Y-m-d y guardarla como string
            'fecha_nacimiento' => Carbon::parse($request->fecha_nacimiento)->format('Y-m-d'),
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rol' => $request->rol,
            'estado' => $request->estado,
            'hora_entrada' => Carbon::createFromFormat('H:i', $request->hora_entrada)->format('H:i:s'),  // Convierte la hora a H:i:s
            'hora_salida' => Carbon::createFromFormat('H:i', $request->hora_salida)->format('H:i:s'),    // Convierte la hora a H:i:s
        ]);
    
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente');
    }
    


    public function show(Empleado $empleado){
        
        return view("empleados.show", compact('empleado'));
    }

    public function edit(Empleado $empleado){
        
        // Roles que puede tener un empleado
        $roles = [
            "Seguridad", "Recepcionista", "Supervisor", "Cocinera", 
            "Contador", "Cajero", "Limpieza", "Mantenimiento", 
            "Almacenista", "Reposteros"
        ];

        // Retorna la vista de edición pasando el empleado y los roles
        return view('empleados.edit', compact('empleado', 'roles'));
    }

    // Método para actualizar la información del empleado
    public function update(Request $request, Empleado $empleado){
        // Validación de los campos que se reciben
        $validated = $request->validate([
            'nombre_apellido' => 'required|string|max:255',
            'dni' => 'required|numeric|digits:8',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'rol' => 'required|string|in:Seguridad,Recepcionista,Supervisor,Cocinera,Contador,Cajero,Limpieza,Mantenimiento,Almacenista,Reposteros',
            'estado' => 'required|string|in:activo,inactivo',
            'hora_entrada' => 'nullable|date_format:H:i:s',
            'hora_salida' => 'nullable|date_format:H:i:s',
        ]);
        

        // Actualización de los datos del empleado
        $empleado->update($validated);

        // Redirige de vuelta al índice de empleados con un mensaje de éxito
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    // Método para eliminar un empleado

    public function destroy(Empleado $empleado){

        $empleado->delete();

        return redirect()->route('empleados.index')->with('success','Empleado eliminado correctamente.');

    }
}
