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
                
              
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="empresas/{{Auth::user()->id}}"><i class="fa fa-align-justify"></i> Informes Finanzieros</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>
           <th scope="col">Nombre</th>
           
        
    
          
           
           <th colspan="2">&nbsp;Informes Financieros</th>
          
         </tr>
    </thead>
       <tbody>
     @foreach ($empresas as $empresa)
        <tr>
            <td>{{$empresa->nombre}}</td>
           
           
            <td width="">
            <a href="{{ route('balances.index2') }}"> <button type="button" class="btn btn-warning btn-xs">
                <i class="fas fa-plus"></i>Balances General </button> </a>
            </td>
            <td width="">
                <a href="#"> <button type="button" class="btn btn-info btn-xs">
                    <i class="fas fa-plus"></i>Estados de Resultados</button> </a>
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
