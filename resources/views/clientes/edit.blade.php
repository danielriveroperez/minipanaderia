@extends('layouts.app')
@section('titulo', 'Editar Cliente')
@section('cabecera', 'Editar Cliente ' . $cliente->nombre)

@section('contenido')
 <div class="flex justify-center">
  <div class="card w-96 shadow-2xl bg-base-100">
    <div class="card-body">
      <form action="{{route('clientes.update', $cliente->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-control">
        <label class="label" for="nombre">
          <span class="label-text">Nombre</span>
        </label>
        <input type="text" name="nombre" placeholder="Nombre cliente" class="input input-bordered" maxlength="100" 
value="{{$cliente->nombre}}" required />
           </div>
           <div class="form-control">
             <label class="label" for="apellido">
               <span class="label-text">Apellido</span>
             </label>
             <input type="text" name="apellido" placeholder="Escriba el apellido" class="input input-bordered" 
maxlength="255" value="{{$cliente->apellido}}" />
           </div>
           <div class="form-control">
             <label class="label" for="direccion">
               <span class="label-text">Direccion</span>
             </label>
             <input type="text" name="direccion" placeholder="Escriba la direccion" class="input input-bordered" 
maxlength="255" value="{{$cliente->direccion}}" />
           </div>
           <div class="form-control">
             <label class="label" for="correo">
               <span class="label-text">Correo</span>
             </label>
             <input type="text" name="correo" placeholder="Escriba el correo" class="input input-bordered" 
maxlength="255" value="{{$cliente->correo}}" />
         </div>
         <div class="form-control mt-6">
           <button class="btn btn-primary">Actualizar Cliente</button>
           <a href="{{ route('clientes.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
         </div>
       </form>
     </div>
   </div>
 </div>
 @endsection

