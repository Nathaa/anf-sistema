@extends('template.plantilla2')

@section('content')


<div class="container">
    
    <div class="card">
     <div class="card-body">
        
        <table class="table table-bordered thead-dark table-hover table-sm">
            <form action="" method="get" role="form">
              {{ csrf_field() }}
            <tr>
   
              <th scope="col">Cuentas</th>
              
              <th scope="col">Monto</th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($balances as $balance)
              <tr>
              <?php if($balance->nombre == "ACTIVO" || $balance->nombre == "ACTIVO CORRIENTE" || $balance->nombre == "ACTIVO NO CORRIENTE"){ ?>
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