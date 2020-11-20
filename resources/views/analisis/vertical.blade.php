@extends('template.plantilla2')
@section('content')
<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">         
                
                 <h5 class="card-title font-weight-bold text-primary">Análisis por Balances de la Empresa </h5>
                
      </div>

        <div class="card-body">
        


            <form action="{{ url('/analisisv/'.$empress) }}"  method="POST" role="form">

              {{ csrf_field() }}

              
            <div class="form-group">


                <div class="row">



                    <div class="col">
                        <label for="fecha_inicial" class="control-label">Años Analizar</label><br>
                        <select class="form-control" id="fecha_inicial" name="fecha_inicial" required="true">
                          <option value="">Debe seleccionar año menor</option> 
                          <outgroup label="yyy">
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_inicio}}">{{$balance->fecha_inicio}}</option>
                            @endforeach
                            </outgroup>
                        </select>
                        <input id="Tipo" name="Tipo" type="hidden" value=" ">
                    </div>

               

                    <div class="col">
                        <label for="fecha_final" class="control-label">Años Analizar</label><br>
                        <select class="form-control" id="fecha_final" name="fecha_final" required="true">
                          <option value="">Debe seleccionar año mayor</option> 
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_final}}">{{$balance->fecha_final}}</option>
                            @endforeach
                        </select>
                    </div>


                   
                </div>


            </div>



            <div class="form-group">
                
                    <div class="form-group">                                  
                        <button type="submit" class="btn btn-primary btn-sm">Generar Analisis Vertical</button> 
                    </div>
                   
               
            </div>


            </form>
            </div>

      </div>


          <div class="card">
      <div class="card-header">         
                
                 <h5 class="card-title font-weight-bold text-primary">Análisis por Estados de Resultados de la Empresa </h5>
                
      </div>

        <div class="card-body">
        


            <form action="{{ url('/analisisv/'.$empress) }}"  method="POST" role="form">

              {{ csrf_field() }}

              
            <div class="form-group">


                <div class="row">



                    <div class="col">
                        <label for="fecha_inicial" class="control-label">Años Analizar</label><br>
                        <select class="form-control" id="fecha_inicial" name="fecha_inicial" required="true">
                          <option value="">Debe seleccionar año menor</option> 
                          <outgroup label="yyy">
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_inicio}}">{{$balance->fecha_inicio}}</option>
                            @endforeach
                            </outgroup>
                        </select>
                        <input id="Tipo" name="Tipo" type="hidden" value=" ">
                    </div>

               

                    <div class="col">
                        <label for="fecha_final" class="control-label">Años Analizar</label><br>
                        <select class="form-control" id="fecha_final" name="fecha_final" required="true">
                          <option value="">Debe seleccionar año mayor</option> 
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_final}}">{{$balance->fecha_final}}</option>
                            @endforeach
                        </select>
                    </div>


                   
                </div>


            </div>



            <div class="form-group">
                
                    <div class="form-group">                                  
                        <button type="submit" class="btn btn-primary btn-sm">Generar Analisis Vertical</button> 
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