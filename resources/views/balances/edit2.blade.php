@extends('template.plantilla2')

@section('content')


<div class="container">
    <div class="card">
     <div class="card-body">
     @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{Session::get('message')}}
                </div>
                @endif
        <table class="table table-bordered thead-dark table-hover table-sm">
        
          <form action="{{ url('/balances/'.$empresas) }}"  method="POST" role="form">
        
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        

                <div class="form-group">
                <div class="row">
                
                <div class="col">
                <label for="fecha_inicio" class="control-label">{{'Fecha Inicio'}}:</label><br>
                <input type="date" class="form-control"id="fecha_inicio" name="fecha_inicio" value=""><br>
                </div>
                <div class="col">
                <label for="fecha_final" class="control-label">{{'Fecha Finalizacion'}}:</label><br>
                <input type="date" class="form-control"id="fecha_final" name="fecha_final" value=""><br>
                </div>
                </div>
                </div>
            <tr>
   
              <th scope="col">Cuentas</th>
              <th scope="col"><label for="monto[]" class="control-label">{{'Monto'}}</label></th>
              <!--<th scope="col">Fecha Inicio</th>
              <th scope="col">Fecha Finalizacion</th>-->
    
            </tr>
          </thead>
          <tbody>
            @foreach ($balances as $balance)
             <tr>
             <?php if($balance->nombre == "ACTIVO" || $balance->nombre == "ACTIVO CORRIENTE" || $balance->nombre == "ACTIVO NO CORRIENTE"
                   || $balance->nombre == "PASIVO" || $balance->nombre == "PASIVO CORRIENTE" || $balance->nombre == "PASIVO NO CORRIENTE"
                   || $balance->nombre == "PATRIMONIO"){ ?>
              <td style="font-weight:bold; font-family: cursive;">{{$balance->nombre}}</td>
              <td align="right" style="font-family: cursive;" >$ {{$balance->monto}}</td>
              <?php }else{ ?>
              <td>{{$balance->nombre}}</td>
              <td align="right">$ {{$balance->monto}}</td>
              <?php } ?>   
             </tr>
           @endforeach
  
         </tbody>
        </table>
        <div class="form-group">
           <button class="btn btn-primary" type="submit"> Guardar </button>
       </div>
        <input type="submit" class="btn btn-success" value="">
        <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
   </form>
       </div>
   </div>
</div>

@endsection