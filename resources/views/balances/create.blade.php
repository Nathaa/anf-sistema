@extends('template.plantilla2')

@section('content')


<div class="container">
    <div class="card">
     <div class="card-body">

        <table class="table table-bordered thead-dark table-hover table-sm">
            <form action="{{route('balances.store') }}" method="POST" role="form">
              {{ csrf_field() }}
            
              <th scope="col">Cuentas</th>
              
              <th scope="col"><label for="monto[]" class="control-label">{{'Monto'}}:</label></th>
             
    
            </tr>
          </thead>
          <tbody>
             @foreach ($cuentas as $cuenta)
              <tr>
               <!--<td>{{$cuenta->fecha_inicio}}</td>-->
               <td><input type="text"  name="fecha_inicio[]" value="{{$cuenta->fecha_inicio}}"><br></td>
               <td><input type="float" class="form-control" id="monto" name="monto[]" value=""><br></td>
               
               <td><input type="text" name="cuenta_id[]" value="{{$cuenta->id}}"></td>
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