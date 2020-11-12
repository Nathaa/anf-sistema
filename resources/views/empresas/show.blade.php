@extends('template.plantilla2')


@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-right">
    <li class="breadcrumb-item active"><a href="{{ route('empresas.edit', $empresa->id)}}"><button type="button" class="btn btn-secondary "><i class="fas fa-edit"></i>Editar Empresa</button></a></li>
  <li class="breadcrumb-item active"><a href="{{url()->previous()}}" ><button type="button" class="btn btn-dark  "><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
@endsection


@section('content')

 <div class="container">
     <th scope="row"></th>


     <div class="card">

        <div class="card-body">

         <table class="table table-bordered table-hover">
             <thead class="bg-primary">
                 <tr>
                 <th>Datos de la Empresa</th>
                 </tr>

                </thead>
         </table>
         <table class="table table-bordered table-hover">


     <tbody>

         <tr>
             <th scope="row"><strong>Código:</strong></th>
             <td> <p> {{$empresa->codigo}}</p></td>
             <th scope="row"><strong>Descripción: </strong></th>
              <td><p> {{$empresa->descripcion}}</p></td>
         </tr>
          
         <tr>

        </tr>
           <tr>
               <th scope="row"><strong>Nombre:</strong></th>
                <td><p>{{ $empresa->nombre }}</p></td>
               <th scope="row"><strong>Rubro</strong></th>
               <td> <p> {{$empresa->rubro}}</p></td>
           </tr>

        <tr>

        </tr>
            </tbody>
    </table>

            </div>
    </div>
</div>
@endsection