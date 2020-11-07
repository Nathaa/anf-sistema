@extends('template.plantilla2')

@section('content')


<div class="container">
    <div class="card">
     <div class="card-body">

        <table class="table table-bordered thead-dark table-hover table-sm">
            <form action="{{route('balances.store') }}" method="POST" role="form">
              {{ csrf_field() }}
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
              <th scope="col">Cuentas</th>
              <th scope="col"><label for="monto[]" class="control-label">{{'Monto'}}</label></th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($cuentas as $cuenta)
           
              <tr>
               <!--<td></td>-->
               <?php if($cuenta->nombre == "ACTIVO" || $cuenta->nombre == "ACTIVO CORRIENTE" || $cuenta->nombre == "ACTIVO NO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="monto" name="monto[]" value=""><br></td>
               
                <td><input readonly type="hidden" name="cuenta_id[]" value="{{$cuenta->id}}"></td>
                <?php }else{ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control" id="monto" name="monto[]" value=""><br></td>
                
                <td><input type="hidden" name="cuenta_id[]" value="{{$cuenta->id}}"></td>
               <?php } ?>                      
               <!--<td><input type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>-->
               
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