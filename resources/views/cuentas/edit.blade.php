@extends('template.plantilla2')

@section('crear')

@endsection

@section('content')
<div class="container">
    <div class="container">
      <div class="card">
  
      
       <div class="card-body">

<form action="{{ url('/cuentas/'.$cuentas->id) }}" method="POST" id="formulario">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <div class="row">
          <div class="col">
                  <label for="codigo" class="control-label">{{'Codigo'}}:</label><br>
                  <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $cuentas->codigo }}"  onkeyup="validar_numero(this)", onblur="validar_numero(this)" ><br>
                  <div class="invalid-feedback" style="display:none">
                    El código debe estar conformado por números.
                 </div>
          </div>
          <div class="col">
              <label for="codigo_padre" class="control-label">{{'Codigo Precedente'}}:</label><br>
              <input type="text" class="form-control" id="codigo_padre" name="codigo_padre" value="{{ $cuentas->codigo_padre }}" onkeyup="validar_numero(this)", onblur="validar_numero(this)"><br>
              <div class="invalid-feedback" style="display:none">
                El código precedente debe estar conformado por números.
            </div>
          </div>
      </div>
  
  <div class="form-group">
      <div class="row">
          <div class="col">
              <label for="nombre" class="control-label">{{'Nombre'}}:</label><br>
              <input type="text" class="form-control"id="nombre" name="nombre" value="{{ $cuentas->nombre }}"  onkeyup="validar(this)", onblur="validar(this)"><br>
              <div class="invalid-feedback" style="display:none">
                El nombre de la cuenta no debe comenzar con números ni caracteres especiales.
            </div>
          </div>

          <div class="col">
            <label for="tipocuentas_id" class="control-label">{{'Tipo de cuenta'}}:</label><br>
            <select class="form-control" id="tipocuentas_id" name="tipocuentas_id"  onkeyup="validar_select(this)", onblur="validar_select(this)">
               @foreach($tipocuentas as $tp)
               @if ($tp->id ==  $cuentas->tipocuentas_id)
               <option value="{{ $tp->id }}" selected>{{ $tp->subtipo }}</option>
               @else
            <option value="{{ $tp->id }}">{{ $tp->subtipo}}</option>
               @endif
               @endforeach
            </select>
            <div class="invalid-feedback" style="display:none">
              El tipo de cuenta no debe quedar vacío.
           </div>
        </div>
          
         
      </div>
  </div>
  <div class="form-group">
      <div class="row">
          <div class="col">
              <label for="descripcion" class="control-label">{{'Catalogo'}}:</label><br>
              <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $cuentas->descripcion }}" onkeyup="validar(this)", onblur="validar(this)"><br>
              <div class="invalid-feedback" style="display:none">
                El descripcion de la cuenta no debe comenzar con números ni caracteres especiales.
            </div>
          </div>
          <div class="col">
            <label for="empresas_id"class="control-label">{{'Empresa'}}:</label><br>
            <select class="form-control" id="empresas_id" name="empresas_id" onkeyup="validar_select(this)", onblur="validar_select(this)">
                @foreach($empresa as $emp)
               @if ($emp->id ==  $cuentas->empresas_id)
               <option value="{{ $emp->id }}" selected>{{ $emp->nombre }}</option>
               @else
               <option value="{{ $emp->id }}">{{ $emp->nombre }}</option>
               @endif
               @endforeach
            </select>
            <div class="invalid-feedback" style="display:none">
              La empresa no debe quedar vacío.
            </div>
        </div>
      </div>
  

      <form>
        <div align="left">
          <button class="btn btn-primary" type="submit" id="btn_submit"> Guardar </button>
          <button class="btn btn-primary" href="{{ url('/cuentash/'.$cuentas->empresas_id) }}"> Regresar </button>
        
          </a>
          </div>
         </form>
  
             
         
  
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