@extends('template.plantilla2')


@section('content')

   
<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title font-weight-bold text-primary">Comparacion de Ratios  de la Empresa </h5>
          
      </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href=""><i class="fa fa-align-justify"></i> Seleccione el año a comparar</a>
                </div>
            </div>
          
           

             <form action="{{ url('/comparaciones1/'.$empress) }}"  method="GET" role="form">
                
            
            
            <div class="form-group">
                <div class="row">
                  
                    <div class="col">
                        <label for="fecha_final" class="control-label">{{'Fecha'}}:</label><br>
                        <select class="form-control" id="fecha_final" name="fecha_final" >
                          <option value="">Debe seleccionar Año</option> 
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_final}}">{{$balance->fecha_final}}</option>
                            @endforeach
                        </select>
                       
                    </div>

                    <div class="col">
                        <label for="valor" class="control-label">{{'Comparacion a realizar'}}:</label><br>
                        <select class="form-control" id="valor" name="valor" >
                          <option value="">Seleccionar tipo de comparacion a realizar</option> 
                         
                         <option value="1">Comparacion estandar de la Empresa</option>
                         <option value="2">Comparacion con mas empresas del mismo Rubro</option>
                           
                        </select>
                       
                    </div>
                   
                </div>
            </div>

         <br>
            <div class="form-group">
                
                <div class="form-group">                                  
                  <button type="submit" class="btn btn-primary btn-sm">Realizar Comparacion</button> 
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