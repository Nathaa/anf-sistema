@extends('template.plantilla2')

@section('content')


<div class="container">
    
    <div class="card">
     <div class="card-body">
        <tr>
        <td scope="col">Fecha Inicio</td>
        <th scope="col">Fecha Finalizacion</th>
        </tr>
        <table class="table table-bordered thead-dark table-hover table-sm">
            <form action="" method="get" role="form">
              {{ csrf_field() }}
            <tr>
   
              <th scope="col">Cuentas</th>
              
              <th scope="col">monto</th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($balances as $balance)
              <tr>
               <td>{{$balance->nombre}}</td>
               <td>{{$balance->monto}}</td>
              
               
            
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