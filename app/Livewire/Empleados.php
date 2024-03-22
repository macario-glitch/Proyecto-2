<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class Empleados extends Component
{
    public $empleados;

    public function render()
    {
        $this->empleados = Empleado::all();
        return view('livewire.empleados');
    }
}
