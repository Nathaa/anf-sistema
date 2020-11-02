{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Periodo
</div>

<form id="formulario">

    <div class="row">
       <div class="col">
         {{ Form::label('codigo', 'Codigo')}}
         {{ Form::text('codigo',null,['class' => 'form-control', 'id'=>'codigo','onkeyup' => "validar_codigo(this)", 'onblur' => "validar_codigo(this)", 'onkeyup' => "validar_string(this)", 'placeholder' => 'Debe colocar un codigo correspondiente al periodo', 'required' => 'required','autofocus'=>'autofocus']) }}
         
       </div>
       <div class="col">
         {{ Form::label('codigo_padre', 'Codigo padre')}}
         {{ Form::text('codigo_padre',null,['class' => 'form-control', 'id'=>'codigo_padre','onkeyup' => "validar_codigo(this)", 'onblur' => "validar_codigo(this)", 'onkeyup' => "validar_string(this)", 'placeholder' => 'Debe colocar un codigo correspondiente al periodo', 'required' => 'required','autofocus'=>'autofocus']) }}
         
       </div>
       

     </div>

     <div class="row">
     <div class="col">
         {{ Form::label('nombre', 'Nombre')}}
         {{ Form::text('nombre',null,['class' => 'form-control', 'id'=>'nombre','onkeyup' => "validar_numero(this)", 'onblur' => "validar_numero(this)",'placeholder' => 'Debe colocar la cantidad de semanas del periodo', 'required' => 'required','autofocus'=>'autofocus']) }}
       </div>
         <div class="col">
             {{ Form::label('descripcion', 'Fecha de Finalizacion')}}
            {{ Form::date('descripcion',null,['class' => 'form-control', 'id'=>'descripcion','onkeyup' => "validar_fecha(this)", 'onblur' => "validar_fecha(this)", 'required' => 'required','autofocus'=>'autofocus']) }}
            
         </div>
     </div>
 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
</ol>


</form>

@section('scripts')
<script src="{{ asset('js/validar-form-periodo.js') }}"></script>
@endsection



