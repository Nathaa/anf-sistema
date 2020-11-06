@extends('template.plantilla2')

@section('content')


<div class="container">
    <div class="card">
     <div class="card-body">
        <table class="table table-bordered thead-dark table-hover table-sm">
            <form action="{{route('balances.store') }}" method="POST" role="form">
              {{ csrf_field() }}
            <tr>
   
              <th scope="col">Cuentas</th>
              <th scope="col"><label for="monto" class="control-label">{{'Monto'}}:</label></th>
              <th scope="col">Fecha Inicio</th>
              <th scope="col">Fecha Finalizacion</th>
    
            </tr>
          </thead>
          <tbody>
             @foreach ($balances as $balance)
              <tr>
               <td>{{$balance->nombre}}</td>
               <td><input type="float" class="form-control" id="monto" name="monto" value=""><br></td>
               <td><input type="text" class="form-control" id="" name="" value=""><br></td>
               <td><input type="text" class="form-control" id="" name="" value=""><br></td>
            
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