@extends('template.plantilla2')


@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-right">
    <li class="breadcrumb-item active"><a href="{{ route('tipocuentas.edit', $tipocuenta->id)}}"><button type="button" class="btn btn-secondary "><i class="fas fa-edit"></i>Editar Tipo de Cuenta</button></a></li>
  <li class="breadcrumb-item active"><a href="{{ route('tipocuentas.index')}}" ><button type="button" class="btn btn-dark  "><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
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
                 <th>Datos de Tipo de cuenta</th>
                 </tr>

                </thead>
         </table>
         <table class="table table-bordered table-hover">


     <tbody>

         <tr>
             <th scope="row"><strong>Nombre:</strong></th>
             <td><p><strong> {{$tipocuenta->nombre}}<strong></p></td>
           
              <th scope="row"><strong>Descripción :</strong></th>
                <td><p><strong>{{ $tipocuenta->descripcion }}</strong></p></td>
         </tr>
          
         <tr>

        </tr>
           <tr>
            <th scope="row"><strong>Subtipo: </strong></th>
            <td><p><strong> {{$tipocuenta->subtipo}}</strong></p></td>
           </tr>
        <tr>

        </tr>
            </tbody>
    </table>


            </div>
    </div>
</div>
@endsection