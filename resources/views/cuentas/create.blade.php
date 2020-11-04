@extends('template.plantilla2')

@section('content')
<div class="container">
<form action="{{ url('/cuentas') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  @include('cuentas.form',['Modo'=>'crear'])
</form>

</div>
@endsection