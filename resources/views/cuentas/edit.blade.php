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

<form action="{{ url('/cuentas/'.$cuentas->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('cuentas.form',['Modo'=>'editar'])
</form>

</div>
@endsection