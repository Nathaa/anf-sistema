@extends('template.plantilla2')

@section('crear')

@endsection

@section('content')
<div class="container">
  <div class="container">
    <div class="card">

    
     <div class="card-body">

    
    <form action="{{route('cuentas.store') }}" method="POST" role="form" id="formulario">

        {{ csrf_field() }}
      

        <div class="form-group">
            <div class="row">
                <div class="col">
                        <label for="codigo" class="control-label">{{'Codigo'}}:</label><br>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}" placeholder="Codigo de la cuenta"  onkeyup="validar_numero(this)", onblur="validar_numero(this)" required>
                        <div class="invalid-feedback">
                           El código debe estar conformado por números.
                        </div>
                </div>
                <div class="col">
                    <label for="codigo_padre" class="control-label">{{'Codigo Precedente'}}:</label><br>
                    <input type="text" class="form-control" id="codigo_padre" name="codigo_padre" value="{{ old('codigo_padre') }}" placeholder="1->Activo"  onkeyup="validar_numero(this)", onblur="validar_numero(this)" required>
                    <div class="invalid-feedback">
                        El código precedente debe estar conformado por números.
                    </div>
                </div>
            </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="nombre" class="control-label">{{'Nombre'}}:</label><br>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre de la Cuenta" onkeyup="validar(this)", onblur="validar(this)" required>
                    <div class="invalid-feedback">
                        El nombre de la cuenta no debe comenzar con números ni caracteres especiales.
                    </div>
                </div>
                
                <div class="col">
                    <label for="tipocuentas_id" class="control-label">{{'Tipo de cuenta'}}:</label><br>
                    <select class="form-control" id="tipocuentas_id" name="tipocuentas_id" onkeyup="validar_select(this)", onblur="validar_select(this)" required>
                      <option value="">Debe seleccionar una opción</option> 
                      @foreach ($tipocuentas as $tp)
                     <option value="{{ $tp->id }}">{{$tp->subtipo}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        El tipo de cuenta no debe quedar vacío.
                     </div>
                </div>
               
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="descripcion" class="control-label">{{'Catalogo'}}:</label><br>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}"  placeholder="Breve descripción de la cuenta" onkeyup="validar(this)", onblur="validar(this)" required>
                    <div class="invalid-feedback">
                        El descripcion de la cuenta no debe comenzar con números ni caracteres especiales.
                    </div>
                </div>
                <div class="col">
                    <label for="empresas_id"class="control-label">{{'Empresa'}}:</label><br>
                    <select class="form-control" id="empresas_id" name="empresas_id" onkeyup="validar_select(this)", onblur="validar_select(this)" required>
                        @foreach ($empresa as $emp)
                    <option value="{{ $emp->id }}">{{$emp->nombre}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                            La empresa no debe quedar vacío.
                     </div>
                </div>
            </div>
        
        
                    <button class="btn btn-primary" type="submit" id="btn_submit"> Guardar </button>
                    <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
        
          </div>
        </div>

    </form>

    </div>


    </div>
    </div>
      </div>

@endsection
@section('scripts')
<script src="{{ asset('js/validacion-cuentas.js') }}"></script>
@stop