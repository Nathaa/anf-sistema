@extends('template.plantilla2')

@section('crear')
<div class="col-sm-6">
        @if(Session::has('info'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('info') }}
        </div>
        @endif
</div>
@endsection




@section('content')
<h6>
    @if($search)
   <div class="alert alert-info" role="alert">
     Los resultados de tu búsqueda : {{ $search }} 
   </div>
   @endif
</h6>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
                <a href="{{ route('empresas.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Empresa</button> </a>
                <a href="{{ route('balances.create') }}"> <button type="button" class="btn btn-warning btn-xs">
                    <i class="fas fa-plus"></i>Crear Catálogo de Cuentas del Balance General </button> </a>
                <a href="#"> <button type="button" class="btn btn-info btn-xs">
                <i class="fas fa-plus"></i>Crear Catálogo de Cuentas del Estado de Resultados</button> </a>
              
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('empresas.index') }}"><i class="fa fa-align-justify"></i> Listado de Empresas</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>
           <th scope="col">Nombre</th>
           
           <th scope="col">Rubro</th>
           <th scope="col">Representante de Empresa</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
    </thead>
       <tbody>
     @foreach ($empresas as $empresa)
        <tr>
            <td>{{$empresa->nombre}}</td>
            <td>{{$empresa->rubro}}</td>
            <td>{{$empresa->nombre_usu}}</td>
            <td width="10px">
            
                <a href="{{ url('/empresas/'.$empresa->id.'/edit') }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
        
            </td>
            <td width="10px">
            
                    <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                        <i class="fas fa-eye" aria-hidden="true"></i>
                      </a>
                    
            </td>
            <td width="10px">

                <form method="POST" action="{{ url('/empresas/'.$empresa->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" class="btn btn-info btn-flat" onclick="return confirm('¿Desea eliminar la Empresa?')" title="Eliminar">
                     <i class="fas fa-trash" aria-hidden="true"></i>
                   </button> 
                   </form>
               
            </td>
        </tr>

    @endforeach

            </tbody>
    </table>
      <br>
            
            </div>
    </div>
</div>

@endsection
