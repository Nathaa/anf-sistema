@extends('template.plantilla2')

@section('crear')

@endsection


@section('content')


<div class="container">
    
    <div class="card">
     <div class="card-body">
        <tr>
        
        </tr>
        <table class="table table-bordered thead-dark table-hover table-sm">
            <form action="{{ url('/cuentash/'.$empresas) }}" method="get" role="form">
              {{ csrf_field() }}
            <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Codigo precedente</th>
            <th scope="col">Cuentas</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
           
              
              
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($cuentas as $cuenta)
              <tr>
                
                <td style="font-weight:bold; font-family: cursive;">{{$cuenta->codigo}}</td>
                <td style="font-weight:bold; font-family: cursive;">{{$cuenta->codigo_padre}}</td>
                <td style="font-weight:bold; font-family: cursive;">{{$cuenta->nombre}}</td>
                <td width="10px">

                    <a href="{{ url('/cuentas/'.$cuenta->id.'/edit') }}" class="btn btn-default btn-flat" title="Editar">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>

                    
                    </td>
         
                    <td width="10px">

                      @if(!Auth::user()->rol == 'Analista')
   
                   <form method="POST" action="{{ url('/cuentas/'.$cuenta->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-danger" class="btn btn-info btn-flat" onclick="return confirm('¿Borrar?')" title="Eliminar">
                   <i class="fas fa-trash" aria-hidden="true"></i>
                 </button> 
                 </form>
                 @endif
                 
                   </td>
              </tr>
            @endforeach
   
          </tbody>
         </table>
    
         <br>
         <form>
         
           </form>
    </form>
        </div>
    </div>
</div>

@endsection