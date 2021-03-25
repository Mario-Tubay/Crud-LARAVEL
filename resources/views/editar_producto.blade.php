@extends('layouts.plantilla')

@section('content')

<style>
    .cabezera{
        text-align:center;
        color: #fff;
    }
    .cabezera h1 {
        padding:10px;
        font-family: var(--fuentePrincipal);
        text-transform: uppercase;
    }
    </style>
    
    
    <div class="cabezera  bg-dark">
        <h1>formulario</h1>
    </div>
    
    <div class="container">
        <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{route('cambiar.producto')}} ">
            @csrf
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre</label>
              <input name="nombre" type="text" class="form-control" id="nombre" value="{{$productos->nombre}}" >
            </div>
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" id="categoria" class="form-select">
                    @foreach($datos as $value)
                        <option value="{{$value->id}}" >{{$value->Nombre}}</option>
                    @endforeach
                </select>
              </div>
            <div class="col-12">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input  class="form-control"  type="file" name="file" accept="image/*">
            </div>  
            <div class="col-12">
              <label for="descripcion" class="form-label">Descripcion</label>
              <textarea  class="form-control"  name="descripcion" id="descripcion" cols="30" rows="10">{{$productos->descripcion}} </textarea>
            </div>
            <input type="hidden" name ="tipo" value="{{$productos->id}}">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Editar</button>
            </div>
          </form>
    </div>
    
    
    
@endsection