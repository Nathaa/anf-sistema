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
                <h5><b><em><p> Comparacion de Razones de Actividad y Efectividad </p></em></b></h5>
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
                    <h5><b><em><p> Comparacion de Razones de Apalancamiento </p></em></b></h5>
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
                        <h5><b><em><p> Comparacion de Razones de Rentabilidad </p></em></b></h5>
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