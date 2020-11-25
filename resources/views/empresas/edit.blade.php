@extends('template.plantilla2')


@section('crear')

@endsection

@section('content')


    <h3><strong>Editar Empresa: {{$empresa->nombre}}</strong> </h3>

    <div class="container">
        <div class="card">
    
        
         <div class="card-body">
           
            
            <table class="table table-bordered table-hover">
    
                    
<form action="{{ url('/empresas/'.$empresa->id) }}" method="POST" id="formulario">
    <input type="hidden" name="_method" value="PUT">


        {{ csrf_field() }}

        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" value="{{ $empresa->nombre}}" class="form-control" placeholder="Nombre de la Empresa" id="nombre"  onkeyup="validar_nombre(this)", onblur="validar_nombre(this)">
            <div class="invalid-feedback" style="display:none">
                El nombre de la Empresa no debe comenzar con números ni caracteres especiales.
            </div>
        </div>

        <div class="form-group">
            <label for="codigo">Código </label>
            <input type="text" name="codigo" value="{{ $empresa->codigo }}" class="form-control" placeholder="Codigo de la Empresa"  id="codigo"  onkeyup="validar_codigo(this)", onblur="validar_codigo(this)">
            <div class="invalid-feedback" style="display:none">
                El código no debe quedar vacío.
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción </label>
            <input type="text" name="descripcion" value="{{ $empresa->descripcion }}" class="form-control" placeholder="Descripcion de la Empresa" id="descripcion" onkeyup="validar_descripcion(this)", onblur="validar_descripcion(this)">
            <div class="invalid-feedback" style="display:none">
                La descripcion no debe comenzar con números ni caracteres especiales.
            </div>
        </div>

        <div class="form-group">
            <label for="rubro">Rubro </label>
            <input type="text" name="rubro" value="{{ $empresa->rubro }}" class="form-control" placeholder="Rubro de la Empresa" id="rubro" onkeyup="validar_rubro(this)", onblur="validar_rubro(this)">
            <div class="invalid-feedback" style="display:none">
                El rubro no debe comenzar con números ni caracteres especiales.
            </div>
        </div>

        <form>
            <div align="left">
              <button class="btn btn-primary" type="submit" id="btn_submit"> Guardar </button>
              <input type="button" class="btn btn-primary" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
              </div>
             </form>
      

</form>

</table>
</div>
</div>
</div>    
@endsection

@section('scripts')
<script src="{{ asset('js/validacion-empresas.js') }}"></script>
@stop