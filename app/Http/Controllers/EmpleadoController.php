<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $empleados = Empleado::when($search, function ($query, $search) {
            return $query->where('nombre_apellido', 'like', "{$search}%")
                        ->orWhere('dni', 'like', "%{$search}%");
        })->paginate(10);

        return view('empleados.index', compact('empleados'));
    }

    public function create(){
        return view("empleados.create");
    }
}
