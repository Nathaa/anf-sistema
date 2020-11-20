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
           

             <form action="{{ url('/ratiosh/'.$empress) }}"  method="GET" role="form">
                
            
            
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="fecha_inicial" class="control-label">{{'Años Analizar'}}:</label><br>
                        <select class="form-control" id="fecha_inicial" name="fecha_inicial" onChange="PasarValor(this.value);">
                          <option value="x">Debe seleccionar año menor</option> 
                          <
                          @foreach ($balances as $balance)
                         <option value="{{$balance->fecha_inicio}}">{{$balance->fecha_inicio}}  </option>
                         
                            @endforeach
                           
                        </select>
                        
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


           <br>
                <div align="center">
                    <div class="form-group">
                    <input id ="AV" name ="AV" value="Generar Ratios" class="btn btn-warning btn-sm" type="submit" /> 
                   
                    
                
            </div>
            </form>
            </div>
      </div>
      </div>
      </div>
      </div>
    </div>
@endsection