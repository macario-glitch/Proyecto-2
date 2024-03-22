<x-slot name="header">
    <h1 class="text-gray-900">Empleados de Pasteleria</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">

        @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
        @endif

        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>
        @if($modal)
            @include('livewire.crear')
        @endif

        <table class="table-fixed w-full table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Puesto</th>
                    <th>Sueldo</th>
                    <th>Sucursal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{$empleado->id}}</td>
                    <td>{{$empleado->Nombre}}</td>
                    <td>{{$empleado->Apellidos}}</td>
                    <td>{{$empleado->Puesto}}</td>
                    <td>${{$empleado->Sueldo}}</td>
                    <td>{{$empleado->Sucursal}}</td>
                    <td class="border px-4 py-2 text-center">
                        <button wire:click="editar({{$empleado->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                        <button wire:click="borrar({{$empleado->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
