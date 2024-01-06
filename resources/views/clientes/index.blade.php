@extends('layouts.app')
@section('titulo', 'Listar Clientes')
@section('cabecera', 'Listar Clientes')

@section('contenido')
 <div class="flex justify-end m-4">
   <a href="{{ route('clientes.create') }}" class="btn btn-outline btn-sm">Crear Cliente</a>
 </div>
 <div class="flex justify-center">
   <div class="overflow-x-auto">
     <table class="table table-zebra">
      <thead>
       <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>correo</th>
        <th>Acciones</th>
       </tr>
      </thead>
      <tbody>
       @foreach ($clientes as $cliente)
        <tr>
          <td>{{ $cliente->nombre }}</td>
          <td>{{ $cliente->apellido }}</td>
          <td>{{ $cliente->direccion }}</td>
          <td>{{ $cliente->correo }}</td>
          <td class="flex space-x-2">
            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-xs">Editar</a>
            {{-- si el cliente no tiene productos asociados, se puede eliminar --}}
            @if($cliente->productos->count() == 0)
            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('¿Desea eliminar el cliente {{ $cliente->nombre }}?')" class="btn 
btn-error btn-xs">Eliminar</button>
                 </form>
                 @endif
                </td>
              </tr>
            @endforeach
         </tbody>
       </table>
      </div>
     </div>
@endsection




