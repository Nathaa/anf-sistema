@extends('pantilla')

@section('content')
<div class="container">
    <div class="card">

     <div class="card-body">
        <table class="table table-bordered table-hover">

                

    <form action="{{route('empresas.store') }}" method="POST" role="form">

            {{ csrf_field() }}

            
            @if(Session::has('flash_message'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{ Session::get('flash_message') }}
            </div>
          @endif

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre de la Empresa">
            </div>

            <div class="form-group">
                <label for="codigo">Código </label>
                <input type="text" name="codigo" value="{{ old('codigo') }}" class="form-control" placeholder="Codigo de la Empresa">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción </label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Descripcion de la Empresa">
            </div>

            <div class="form-group">
                <label for="rubro">Rubro </label>
                <input type="text" name="rubro" value="{{ old('rubro') }}" class="form-control" placeholder="Rubro de la Empresa">
            </div>
            
            <div class="form-group">
            <button class="btn btn-primary" type="submit"> Guardar </button>
        </div>

    </form>

   
        </table>
    </div>
</div>
</div>
@endsection