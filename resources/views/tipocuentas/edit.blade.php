@extends('template.plantilla2')


@section('crear')

@endsection

@section('content')


    <h3><strong>Editar : {{$tipocuenta->nombre}}</strong> </h3>

    <div class="container">
        <div class="card">
    
        
         <div class="card-body">
           
            
            
            <table class="table table-bordered table-hover">
    
                    
<form action="{{ url('/tipocuentas/'.$tipocuenta->id) }}" method="POST" id="formulario">
    <input type="hidden" name="_method" value="PUT">


        {{ csrf_field() }}

        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" value="{{ $tipocuenta->nombre}}" class="form-control" id="nombre"  onkeyup="validar(this)", onblur="validar(this)" >
            <div class="invalid-feedback" style="display:none">
                El nombre del tipo de cuenta no debe empezar con números o carácteres especiales.
            </div>
        </div>


        <div class="form-group">
            <label for="descripcion">Descripción </label>
            <input type="text" name="descripcion" value="{{ $tipocuenta->descripcion }}" class="form-control" id="descripcion" onkeyup="validar(this)", onblur="validar(this)">
            <div class="invalid-feedback" style="display:none">
                La descripción no debe empezar con números o carácteres especiales.
            </div>
        </div>

        <div class="form-group">
            <label for="subtipo">Subtipo </label>
            <input type="text" name="subtipo" value="{{ $tipocuenta->subtipo }}" class="form-control" id="subtipo" onkeyup="validar(this)", onblur="validar(this)" >
            <div class="invalid-feedback" style="display:none">
                El subtipo del tipo de cuenta no debe empezar con números o carácteres especiales.
            </div>
        </div>
 

        <div class="form-group">
            <button class="btn btn-primary" type="submit" id="btn_submit"> Guardar </button>
            <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
    </div>

</form>

</table>
</div>
</div>
</div>    
@endsection

@section('scripts')
<script src="{{ asset('js/validacion-tipo-cuenta.js') }}"></script>
@stop
