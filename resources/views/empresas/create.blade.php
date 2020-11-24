@extends('template.plantilla2')

@section('crear')

@endsection


@section('content')
<div class="container">
    @if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif



    
    <div class="card">

    
     <div class="card-body">
     
        <table class="table table-bordered table-hover">

                

    <form action="{{route('empresas.store') }}" method="POST" role="form" id="formulario">

            {{ csrf_field() }}

            

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre de la Empresa" id="nombre"  onkeyup="validar_nombre(this)", onblur="validar_nombre(this)" required>
                <div class="invalid-feedback" style="display:none">
                    El nombre de la Empresa no debe comenzar con números ni caracteres especiales.
                </div>
            </div>
           

            <div class="form-group">
                <label for="codigo">Código </label>
                <input type="text" name="codigo" value="" class="form-control" placeholder="Codigo de la Empresa" id="codigo"  onkeyup="validar_codigo(this)", onblur="validar_codigo(this)" required>
                <div class="invalid-feedback" style="display:none">
                    El código no debe quedar vacío.
                </div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción </label>
                <input type="text" name="descripcion" value="" class="form-control" placeholder="Descripcion de la Empresa" id="descripcion" onkeyup="validar_descripcion(this)", onblur="validar_descripcion(this)" required>
                <div class="invalid-feedback" style="display:none">
                    La descripcion no debe comenzar con números ni caracteres especiales.
                </div>
            </div>

            <div class="form-group">
                <label for="rubro">Rubro </label>
                <input type="text" name="rubro" value="" class="form-control" placeholder="Rubro de la Empresa" id="rubro" onkeyup="validar_rubro(this)", onblur="validar_rubro(this)">
                <div class="invalid-feedback" style="display:none">
                    El rubro no debe comenzar con números ni caracteres especiales.
                </div>
            </div>
            
            <div class="form-group">
            <button class="btn btn-primary" type="submit" id="btn_submit"> Guardar </button>
           
        </div>

    </form>

   
        </table>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/validacion-empresas.js') }}"></script>
@stop
