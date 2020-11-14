@extends('template.plantilla2')
@section('content')
<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
      
          
      </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href=""><i class="fa fa-align-justify"></i> Seleccione años analizar</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
                <tr>

           
                    <th scope="col"></th>
                    
                    <th colspan="3">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <form action=""  method="POST" role="form">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="fecha_inicial" class="control-label">{{'Años Analizar'}}:</label><br>
                        <select class="form-control" id="fecha_inicial" name="fecha_inicial" >
                          <option value="x">Debe seleccionar año menor</option> 
                          <outgroup label="yyy">
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_inicio}}">{{$balance->fecha_inicio}}</option>
                            @endforeach
                            </outgroup>
                        </select>
                        <input id="Tipo" name="Tipo" type="hidden" value=" ">
                    </div>
                    <div class="col">
                        <label for="fecha_final" class="control-label">{{'Años Analizar'}}:</label><br>
                        <select class="form-control" id="fecha_final" name="fecha_final" >
                          <option value="">Debe seleccionar año mayor</option> 
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_final}}">{{$balance->fecha_final}}</option>
                            @endforeach
                        </select>
                    </div>
                   
                </div>
            </div>
            <div class="form-group">
                <div align="center">
                    <div class="form-group">
                        <a href="{{ url('/analisish/'.$empress) }}" > <button type="button" class="btn btn-warning btn-sm">
                            <i class="fas fa-plus"></i>Generar Analisis Horizontal </button> </a>
                          </a>
                 
                  
                   
                        <a href="{{ url('/analisiv/'.$empress) }}"> <button type="button" class="btn btn-info btn-sm">
                            <i class="fas fa-plus"></i>Generar Analisis Vertical</button> </a>
                    </div>
                   
                </div>
            </div>
            </form>
            </div>
      </div>
      </div>
      </div>
      </div>
@endsection
                
<script>
$(document).ready(function(){
$('#fecha_inicial').change(function(){



    var selected = $(':selected',this);

    $('#Tipo').val(selected.parent().attr('label'));

    alert($('#Tipo').val());
});




});
</script>