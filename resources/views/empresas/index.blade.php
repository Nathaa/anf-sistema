@extends('pantilla')

@section('content')
    

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
             
                 <a href="{{ route('empresas.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Empresas </button> </a>
              
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
           <th scope="col">Codigo</th>
           <th scope="col">Descripcion</th>
           <th scope="col">Rubro</th>
           <th scope="col">Representante de Empresa</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
    </thead>
       <tbody>
     @foreach ($empresas as $empresa)
        <tr>
            <td>{{$empresa->nombre}}</td>
            <td>{{ $empresa->codigo }}</td>
            <td>{{$empresa->descripcion}}</td>
            <td>{{$empresa->rubro}}</td>
            <td>{{$empresa->nombre_usu}}</td>
            <td width="20px">
            
                    <a  class="btn btn-info btn-sm" href="{{ route('empresas.edit', $empresa->id) }}">
                        <i class="glyphicon glyphicon-th-large" ></i>
                    </a>
        
            </td>
            <td width="10px">
                @can('empresas.show')
                    <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                        <i class="fas fa-eye" aria-hidden="true"></i>
                    </a>
                @endcan
            </td>
            <td width="10px">
                @can('empresas.destroy')
                {!! Form::open(['route' => ['empresas.destroy', $empresa->id],
                'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar la empresas?")']) !!}
                    <button class="btn btn-danger" class="btn btn-info btn-flat" title="Eliminar">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                    </button>
                {!! Form::close() !!}
                @endcan
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
