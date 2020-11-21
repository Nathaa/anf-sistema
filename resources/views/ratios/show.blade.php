@extends('template.plantilla2')


@section('content')

   
<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title font-weight-bold text-primary">Generar de Ratios  de la Empresa </h5>
          
      </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href=""><i class="fa fa-align-justify"></i> Seleccione el intervalo de fechas analizar</a>
                </div>
            </div>
          
           

             <form action="{{ url('/ratiosh/'.$empress) }}"  method="GET" role="form">
                
            
            
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="fecha_inicial" class="control-label">{{'Fecha Inicial'}}:</label><br>
                        <select class="form-control" id="fecha_inicial" name="fecha_inicial" onChange="PasarValor(this.value);">
                          <option value="x">Debe seleccionar año menor</option> 
                          <
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_inicio}}">{{$balance->fecha_inicio}}  </option>
                         
                            @endforeach
                           
                        </select>
                        
                    </div>
                    <div class="col">
                        <label for="fecha_final" class="control-label">{{'Fecha Final'}}:</label><br>
                        <select class="form-control" id="fecha_final" name="fecha_final" >
                          <option value="">Debe seleccionar año mayor</option> 
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_final}}">{{$balance->fecha_final}}</option>
                            @endforeach
                        </select>
                       
                    </div>
                   
                </div>
            </div>

         <br>
            <div class="form-group">
                
                <div class="form-group">                                  
                  <button type="submit" class="btn btn-primary btn-sm">Generar Ratios</button> 
                </div>       
                   
            </div>
            </form>
            </div>
      </div>
      </div>
      </div>
      </div>
    </div>
@endsection