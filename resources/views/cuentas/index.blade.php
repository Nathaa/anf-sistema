@extends('template.plantilla2')
@section('content')
<div class="container">

    
 
 <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('cuentas.index') }}"><i class="fa fa-align-justify"></i> Listado cuentas</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Codigo</th>
           <th scope="col">Codigo_psdre</th>
           <th scope="col">Nombre</th>
           <th scope="col">Descripcion</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($cuentas as $cuenta)
           <tr>
            <td>{{$cuenta->codigo}}</td>
            <td>{{$cuenta->codigo_padre}}</td>
             <td>{{$cuenta->nombre}}</td>
             <td>{{$cuenta->descripcion}}</td>
             <td width="10px">
    
                <a href="{{ url('/cuentas/'.$cuenta->id.'/edit') }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  
                </td>
                <td width="10px">
                <a href="{{ route('cuentas.show', $cuenta->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>
                </td>
                <td width="10px">
                <form method="POST" action="{{ url('/cuentas/'.$cuenta->id) }}">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-danger" class="btn btn-info btn-flat" onclick="return confirm('¿Borrar?')" title="Eliminar">
                <i class="fas fa-trash" aria-hidden="true"></i>
              </button> 
              </form>
                
    
                </td>
           </tr>

         @endforeach

       </tbody>
      </table>

</div>
</div>
</div>
</div>
@endsection
