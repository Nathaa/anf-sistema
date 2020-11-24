@extends('template.plantilla2')


@section('content')

<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
 @if(!Auth::user()->rol == 'Analista')

          <a href="{{ route('cuentas.create') }}"> <button type="button" class="btn btn-dark btn-xs">

            <i class="fas fa-plus"></i>Crear Catalogo </button> </a>
            @endif         
              <div align="right">
                <form action="{{ route('cuentas.import.excel') }}" method="POST" enctype="multipart/form-data"
                  @csrf
                  @if(Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                  @endif
                  <input type="file" name="file">
                  <button>Importar Cuentas</button>
                </form>
                </div>
                     
      </div>

        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('cuentas.index') }}"><i class="fa fa-align-justify"></i> Listado de Catalogos</a>
                </div>
            </div>

            <table class="table table-bordered thead-dark table-hover table-sm" id="demo">
         <tr>

           
           <th scope="col">Catalogo</th>
           
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($cuentas as $cuenta)
           <tr>
            
            <td>{{$cuenta->nombre}}</td>
            <!--<td>{{$cuenta->empresas['nombre']}}</td>-->
             
            
                <td width="10px">
                <a href="{{ url('/cuentas/'.$cuenta->empresas_id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>
                </td>
                <td width="10px">

                   @if(!Auth::user()->rol == 'Analista')

                <form method="POST" action="{{ url('/cuentas/'.$cuenta->empresas_id) }}">
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

      <div class="row">
        <div class="mr-auto">
 
          <br> 

          {{$cuentas->links("pagination::bootstrap-4")}}


        </div>
      </div>
  
        </div>
      </div>
    </div>
</div>

@endsection


