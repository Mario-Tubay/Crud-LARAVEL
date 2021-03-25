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
        <form class="row g-3" method="POST" action="{{route('insert.categoria')}} ">
            @csrf
            <div class="col-md-6">
              <label for="titulo" class="form-label">Nueva Categoria</label>
              <input name="nombre" type="text" class="form-control" id="titulo">
            </div>
            <input type="hidden" name="tipo" value="categoria">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Crear</button>
            </div>
          </form>
    </div>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($datos as $value)
                    <tr>
                        <th scope="row"> {{$value->id}} </th>
                        <td> {{$value->Nombre}} </td>
                        <td>
                            <a href="{{route('updates.categoria',['id'=>$value->id] )}} "><i class="far fa-edit"></i></a>
                            <a href="{{route('delete.categoria',['id'=>$value->id] )}} "><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    
@endsection