@extends('template.plantilla2')

@section('content')


<div class="container">
    <div class="card">
     <div class="card-body">
        <table class="table table-bordered thead-dark table-hover table-sm">
            <tr>
   
              
              <th scope="col">Cuentas</th>
              
            
            </tr>
          </thead>
          <tbody>
             @foreach ($balances as $balance)
              <tr>
               
               <td>{{$balance->nombre}}</td>
               <td>{{$balance->monto}}</td>
               <td>{{$balance->fecha_inicio}}</td>
               <td>{{$balance->fecha_fin}}</td>
               <!--<td>{{$cuenta->empresas['nombre']}}</td>-->
              </tr>
            @endforeach
   
          </tbody>
         </table>

     </div>
    </div>
</div>

@endsection