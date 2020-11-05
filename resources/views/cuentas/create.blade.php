@extends('template.plantilla2')

@section('crear')
<div class="col-sm">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active"><a href="{{ route('cuentas.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  
    </ol>
  </div>
@endsection

@section('content')
<div class="container">
<form action="{{ url('/cuentas') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  @include('cuentas.form',['Modo'=>'crear'])
</form>

</div>
@endsection