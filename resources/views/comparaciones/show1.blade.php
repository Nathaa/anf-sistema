@extends('template.plantilla2')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body"> 
       
            <div align="center">
@foreach ($empresas as $empresa)
<h2 style="color:blue;"><b>Comparacion de empresa: {{$empresa->nombre}}</b></h2>


@endforeach
            </div>



<div class="container-fluid">
    <br>
    <div class="card">
       
        <div class="card-body">
            <!-- LIQUIDEZ -->
           
            <div align="center">
                <h5><b><em><p> Comparacion de Razones de Liquidez </p></em></b></h5>
            </div>
            
            
            <div style="float:left;width:100%;">
            <p align="center"></p> 
                <table class="table table-bordered thead-dark table-hover table-sm">
                        
                        <tr>
                        <th scope="col">Razon</th>
              
                       <th scope="col">Resultado</th>

                       <th scope="col">Resultado</th>
               
                        </tr>
                      </thead>
                      @foreach ($balances as $ratior)
                        <tr>
                        
                        <td style="font-weight:bold;">{{$ratior->nombre}}</td>
                        <td align="right"> {{$ratior->bueno}}</td>
                        <td align="right"> {{$ratior->malo}}</td>
                        
                        </tr>
                        @endforeach
                     </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div align="center">
                <h5><b><em><p> Comparacion de Razones de Actividad y Efectividad </p></em></b></h5>
                </div>
                
                
                <div style="float:left;width:100%;">
                <p align="center"></p> 
                    <table class="table table-bordered thead-dark table-hover table-sm">
                            
                    <tr>
                        <th scope="col">Razon</th>
              
                       <th scope="col">Resultado</th>

                       <th scope="col">Resultado</th>
               
                        </tr>
                      </thead>
                      @foreach ($balances1 as $ratior)
                        <tr>
                        
                        <td style="font-weight:bold;">{{$ratior->nombre}}</td>
                        <td align="right"> {{$ratior->bueno}}</td>
                        <td align="right"> {{$ratior->malo}}</td>
                        
                        </tr>
                        @endforeach
                         </table>
                </div>

    </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card">
        <div class="card-body">
                <div align="center">
                    <h5><b><em><p> Comparacion de Razones de Apalancamiento </p></em></b></h5>
                    </div>
                    
                    
                    <div style="float:left;width:100%;">
                    <p align="center"></p> 
                        <table class="table table-bordered thead-dark table-hover table-sm">
                                
                        <tr>
                        <th scope="col">Razon</th>
              
                       <th scope="col">Resultado</th>

                       <th scope="col">Resultado</th>
               
                        </tr>
                      </thead>
                      @foreach ($balances3 as $ratior)
                        <tr>
                        
                        <td style="font-weight:bold;">{{$ratior->nombre}}</td>
                        <td align="right"> {{$ratior->bueno}}</td>
                        <td align="right"> {{$ratior->malo}}</td>
                        
                        </tr>
                        @endforeach
                             </table>
                    </div>

                </div>
            </div>
        </div>
        
   
<div class="container-fluid">
    <div class="card">
        <div class="card-body">     

                    <div align="center">
                        <h5><b><em><p> Comparacion de Razones de Rentabilidad </p></em></b></h5>
                        </div>
                        
                        
                        <div style="float:left;width:100%;">
                        <p align="center"></p> 
                            <table class="table table-bordered thead-dark table-hover table-sm">
                                    
                            <tr>
                        <th scope="col">Razon</th>
              
                       <th scope="col">Resultado</th>

                       <th scope="col">Resultado</th>
               
                        </tr>
                      </thead>
                      @foreach ($balances2 as $ratior)
                        <tr>
                        
                        <td style="font-weight:bold;">{{$ratior->nombre}}</td>
                        <td align="right"> {{$ratior->bueno}}</td>
                        <td align="right"> {{$ratior->malo}}</td>
                        
                        </tr>
                        @endforeach
                                 </table>
                        </div>

        </div>
    </div>
</div>

</div>
</div>
</div>
@endsection