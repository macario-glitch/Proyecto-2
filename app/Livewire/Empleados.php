<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;

class Empleados extends Component
{
    public $empleados, $Nombre, $Apellidos, $Puesto, $Sueldo, $Sucursal, $id_empleado, $rules;
    public $modal = false;

    public function render()
    {
        $this->empleados = Empleado::all();
        return view('livewire.empleados');
        
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->Nombre = '';
        $this->Apellidos = '';
        $this->Puesto = 'Asistente';
        $this->Sueldo = 0.0;
        $this->Sucursal = '';
        $this->id_empleado = '';
    }

    public function editar($id)
    {
        $empleado = Empleado::findOrFail($id);
        $this->id_empleado = $id;
        $this->Nombre = $empleado->Nombre;
        $this->Apellidos = $empleado->Apellidos;
        $this->Puesto = $empleado->Puesto;
        $this->Sueldo = $empleado->Sueldo;
        $this->Sucursal = $empleado->Sucursal;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Empleado::find($id)->delete();
        session()->flash('message', 'Registro del Empleado eliminado correctamente');
    }

    public function guardar()
    {
        $rules = [

            'Nombre' => 'required|string|min:2|max:50|regex:/^[\p{L}\sñ]+$/',

            'Apellidos' => 'required|string|min:2|max:150|regex:/^[\p{L}\sñ]+$/',

            'Puesto' => 'required|string|max:50|in:Pastelero(a),Panadero(a),Decorador(a),Cajero(a),Asistente,Repartidor,Gerente',

            'Sueldo' => 'required|numeric|min:50|max:25000',

            'Sucursal' => 'required|string|max:100|regex:/^[\p{L}\sñ!&#1234567890\-]+$/',
        
        ];

        $this->validate($rules);
        
        Empleado::updateOrCreate(['id'=>$this->id_empleado],
            [
                'Nombre' => $this->Nombre,
                'Apellidos' => $this->Apellidos,
                'Puesto' => $this->Puesto,
                'Sueldo' => $this->Sueldo,
                'Sucursal' => $this->Sucursal
                
            ]);
         
         session()->flash('message',
            $this->id_empleado ? 'Actualización exitosa!' : 'Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();


    }

    
    

}
