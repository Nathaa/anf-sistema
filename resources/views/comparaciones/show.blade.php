@extends('template.plantilla2')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body"> 
       
            <div align="center">
@foreach ($empresas as $empresa)
<h1 style="color:blue;">{{$empresa->nombre}}</h1>


@endforeach
            </div>



<div class="container-fluid">
    <br>
    <div class="card">
       
        <div class="card-body">
            <!-- LIQUIDEZ -->
           
            <div align="center">
            <p> Comparacion de Razones de Liquidez </p>
            </div>
            
            
            <div style="float:left;width:50%;">
            <p align="center"></p> 
                <table class="table table-bordered thead-dark table-hover table-sm">
                        
                        <tr>
               
                        </tr>
                      </thead>
                      <tbody>
                         
               
                      </tbody>
                     </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div align="center">
                <p> Comparacion de Razones de Actividad y Efectividad </p>
                </div>
                
                
                <div style="float:left;width:50%;">
                <p align="center"></p> 
                    <table class="table table-bordered thead-dark table-hover table-sm">
                            
                            <tr>
                   
                            </tr>
                          </thead>
                          <tbody>
                             
                   
                          </tbody>
                         </table>
                </div>

    </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card">
        <div class="card-body">
                <div align="center">
                    <p> Comparacion de Razones de Apalancamiento </p>
                    </div>
                    
                    
                    <div style="float:left;width:50%;">
                    <p align="center"></p> 
                        <table class="table table-bordered thead-dark table-hover table-sm">
                                
                                <tr>
                       
                                </tr>
                              </thead>
                              <tbody>
                                 
                       
                              </tbody>
                             </table>
                    </div>

                </div>
            </div>
        </div>
        
   
<div class="container-fluid">
    <div class="card">
        <div class="card-body">     

                    <div align="center">
                        <p> Comparacion de Razones de Rentabilidad </p>
                        </div>
                        
                        
                        <div style="float:left;width:50%;">
                        <p align="center"></p> 
                            <table class="table table-bordered thead-dark table-hover table-sm">
                                    
                                    <tr>
                           
                                    </tr>
                                  </thead>
                                  <tbody>
                                     
                           
                                  </tbody>
                                 </table>
                        </div>

        </div>
    </div>
</div>

</div>
</div>
</div>
@endsection