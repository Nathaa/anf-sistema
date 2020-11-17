@extends('template.plantilla2')
@section('content') 


 @if(!Auth::user()->rol == 'Analista')
  
<div class="container">
  @if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
          <a href="{{ route ('miembros.create') }}"> <button type="button" class="btn btn-dark btn-xs">
          <i class="fas fa-plus"></i>Crear Analista</button> </a>
      </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="#"><i class="fa fa-align-justify"></i> Listado de miembros</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>
           <th scope="col">Nombre</th>
           <th scope="col">Correo</th>
           <th scope="col">Empresa</th>
           <th scope="col">Encargado</th>
           <th colspan="1">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>

@foreach($analistas as $a)
          	<tr>

            <td>{{$a->name}}</td>
             <td>{{$a->email}}</td>
             <td>{{$empresa->nombre}}</td>
     		<td>{{Auth::user()->name}}</td>	

        

            <td width="10px">

              <form method="POST" action="{{ route('miembros.destroy', $a->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
               <button class="btn btn-danger" class="btn btn-info btn-flat" onclick="return confirm('¿Desea eliminar al analista?')" title="Eliminar">
                <i class="fas fa-trash" aria-hidden="true"></i>
              </button> 
              </form>

            </td>
          </tr>

       @endforeach
       </tbody>
      </table>
      <div class="row">
        <div class="mr-auto">
        
        </div>
      </div>
         
        </div>
     </div>
  </div>
</div>
@endif

@endsection