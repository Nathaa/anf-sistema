@extends('layouts.app')

@section('content')


    <h3>Editar Empresa: {{$empresa->nombre}} </h3>


    
<form action="" method="PATCH" role="form">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" value="{{ $empresa->nombre}}" class="form-control" placeholder="Nombre de la Empresa">
        </div>

        <div class="form-group">
            <label for="codigo">Código </label>
            <input type="text" name="codigo" value="{{ $empresa->codigo }}" class="form-control" placeholder="Codigo de la Empresa">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción </label>
            <input type="text" name="descripcion" value="{{ $empresa->descripcion }}" class="form-control" placeholder="Descripcion de la Empresa">
        </div>

        <div class="form-group">
            <label for="rubro">Rubro </label>
            <input type="text" name="rubro" value="{{ $empresa->rubro }}" class="form-control" placeholder="Rubro de la Empresa">
        </div>

        <div class="form-group">
        <button class="btn btn-primary" type="submit"> Guardar </button>
    </div>

</form>

    
@endsection