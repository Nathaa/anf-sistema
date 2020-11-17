@extends('template.plantilla2')
@section('content')

<h1> hola</h1>
<ul>
@foreach ($sql as $s)
<li>{{$s->nom }}</li>

@endforeach
</ul>

@endsection