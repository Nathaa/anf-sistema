@extends('template.plantilla2')


@section('content')

<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
 @if(!Auth::user()->rol == 'Analista')

          <a href="{{ url('/cuentascrear/'.$empresas->id) }}"> <button type="button" class="btn btn-dark btn-xs">

            <i class="fas fa-plus"></i>Crear Catalogo </button> </a>
            @endif         
             
             <div align="right">
                <form action="{{ route('cuentas.import.excel') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
      
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
            
        </div>
        <table class="table table-bordered thead-dark table-hover table-sm">
     <tr>
       <th scope="col">Empresa</th>
       <th colspan="1">&nbsp;Opciones</th>
      
     </tr>

</thead>
   <tbody>
    
    <tr>
        <td>{{$empresas->nombre}}</td>
   
 
        <td width="10px">
                <a href="{{ url('/cuentash/'.$empresas->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>
                </td>
               
        

    </tr>
  
        </tbody>
</table>
  <br>
 
        </div>
       
      </div>
    </div>
</div>

@endsection


