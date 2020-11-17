@extends('template.plantilla2')

@section('crear')


@endsection

@section('content')
<div class="container">
    <div class="card">

    
     <div class="card-body">
       
        
        
        <table class="table table-bordered table-hover">

                

    <form action="{{route('tipocuentas.store') }}" method="POST" role="form" id="formulario">

            {{ csrf_field() }}

            

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre del tipo de cuenta" id="nombre"  onkeyup="validar(this)", onblur="validar(this)">
                <div class="invalid-feedback" style="display:none">
                    El nombre del tipo de cuenta no debe empezar con números o carácteres especiales.
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción </label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Descripcion del Tipo de Cuenta" id="descripcion" onkeyup="validar(this)", onblur="validar(this)">
                <div class="invalid-feedback" style="display:none">
                    La descripción no debe empezar con números o carácteres especiales.
                </div>
            </div>

            <div class="form-group">
                <label for="rubro">Subtipo </label>
                <input type="text" name="subtipo" value="{{ old('subtipo') }}" class="form-control" placeholder="Subtipo, por ejemplo: Activo no Corriente" id="subtipo" onkeyup="validar(this)", onblur="validar(this)">
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
