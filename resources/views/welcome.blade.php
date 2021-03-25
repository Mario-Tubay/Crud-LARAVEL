@extends('layouts.plantilla')

@section('content')

<div class="container">
    @foreach ($datos as $value)
    <div class="card" style="width: 18rem;">
        <img src="{{$value->pfoto}} " class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$value->pnombre}}</h5>
          <p class="card-text">{{$value->cnombre}}</p>
          <p class="card-text">{{$value->pdes}}</p>
          <a href="{{route('update.producto',['id'=>$value->pid] )}}" class="btn btn-primary">Editar</a>
          <a href="{{route('delete.producto',['id'=>$value->pid] )}} " class="btn btn-primary">Eliminar</a>
        </div>
      </div>
    @endforeach
    
</div>





@endsection