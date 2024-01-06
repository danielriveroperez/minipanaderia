@extends('layouts.app')
@section('titulo', 'Editar Producto')
@section('cabecera', 'Editar Producto - ' . $producto->nombre)

@section('contenido')
 <div class="flex justify-center">
   <div class="card w-96 shadow-2xl bg-base-100">
     <div class="card-body">
     {{-- Imagen --}}
     <div>
       @if(file_exists('images/productos/producto_' . $producto->id . '.jpg'))
        <img src="{{ asset('images/productos/producto_' . $producto->id . '.jpg') }}" alt="{{$producto->nombre}}" class="rounded-t-lg h-40 w-full object-cover">
          @else
           <img src="{{ asset('images/productos/default.jpg') }}" alt="{{$producto->nombre}}" class="rounded-t-lg">
          @endif
        </div>
        <form action="{{route('productos.update', $producto)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          {{-- Cliente --}}
          <div class="form-control">
            <label class="label" for="cliente_id">
              <span class="label-text">Cliente</span>
            </label>
            <select name="cliente_id" class="select select-bordered">
              @foreach ($clientes as $cliente)
                @if ($cliente->id == $producto->cliente_id)
                 <option value="{{$cliente->id}}" selected>{{$cliente->nombre}}</option>
                @else
                 <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                @endif
               @endforeach
             </select>
           </div>
           {{-- Nombre --}}
           <div class="form-control">
           <label class="label" for="nombre">
             <span class="label-text">Nombre</span>
           </label>
           <input type="text" name="nombre" placeholder="Nombre del producto" class="input input-bordered" maxlength="100" value="{{$producto->nombre}}" required />
         </div>
         {{-- Imagen --}}
         <div class="form-control">
           <label class="label" for="imagen">
             <span class="label-text">Cambiar imagen</span>
           </label>
           <input type="file" name="imagen" class="file-input file-input-bordered file-input-success file-input-sm w-full max-w-xs" accept=".jpg" />
         </div>
         {{-- precio --}}
         <div class="form-control">
           <label class="label" for="precio">
             <span class="label-text">Precio</span>
           </label>
           <input type="text" name="precio" placeholder="Escriba el precio" class="input input-bordered" maxlength="255" 
value="{{$producto->precio}}" />
         </div>
         {{-- Precio --}}
         <div class="form-control">
           <label class="label" for="descripcion">
             <span class="label-text">Descripcion</span>
           </label>
           <input type="text" name="descripcion" placeholder="Escriba la descripcion" class="input input-bordered" maxlength="255" 
value="{{$producto->descripcion}}" />
         </div>
         {{-- Stock --}}
         <div class="form-control">
           <label class="label" for="stock">
             <span class="label-text">Stock</span>
           </label>
           <input type="number" name="stock" placeholder="Escriba el stock" class="input input-bordered" value="{{$producto->stock}}" required />
         </div>

         <div class="form-control mt-6">
           <button class="btn btn-primary">Actualizar Producto</button>
           <a href="{{ route('productos.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
         </div>
       </form>
     </div>
   </div>
 </div>
@endsection


