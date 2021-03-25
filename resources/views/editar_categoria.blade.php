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
        <form class="row g-3" method="POST" action="{{route('modificar.categoria')}} ">
            @csrf
            <div class="col-md-6">
              <label for="titulo" class="form-label">Editar Categoria</label>
              <input name="nombre" type="text" class="form-control" id="titulo" value="{{$datos->Nombre}}" >
            </div>
            <input type="hidden" name="id" value="{{$datos->id}} ">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Editar</button>
            </div>
          </form>
    </div>


    @endsection