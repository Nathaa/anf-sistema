@extends('template.plantilla2')


@section('crear')
<div class="col-sm">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active"><a href="{{ route('tipocuentas.index')}}" ><button type="button" class="btn btn-dark  btn-m"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  
    </ol>
  </div>
@endsection

@section('content')


    <h3><strong>Editar : {{$tipocuenta->nombre}}</strong> </h3>

    <div class="container">
        <div class="card">
    
        
         <div class="card-body">
           
            <div class="alert alert-primary" role="alert">
                <strong>Datos del Tipo de Cuenta</strong>
            </div>
            
            <table class="table table-bordered table-hover">
    
                    
<form action="{{ url('/tipocuentas/'.$tipocuenta->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">


        {{ csrf_field() }}

        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" value="{{ $tipocuenta->nombre}}" class="form-control" >
        </div>


        <div class="form-group">
            <label for="descripcion">Descripción </label>
            <input type="text" name="descripcion" value="{{ $tipocuenta->descripcion }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="subtipo">Subtipo </label>
            <input type="text" name="subtipo" value="{{ $tipocuenta->subtipo }}" class="form-control" >
        </div>
 

        <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar </button>
    </div>

</form>

</table>
</div>
</div>
</div>    
@endsection