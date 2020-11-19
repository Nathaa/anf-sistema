@extends('template.plantilla2')
@section('content')
<h1 align='center'>Análisis Horizantal</h1>

<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
      
          
      </div>
        <div class="card-body">
           
        <form action="{{ url('/analisish/'.$empress) }}"  method="POST" role="form">

{{ csrf_field() }}


<div class="form-group">


  <div class="row">



      <div class="col">
          <label for="fecha_inicial" class="control-label">Años Analizar</label><br>
          <select class="form-control" id="fecha_inicial" name="fecha_inicial" required="true">
            <option value="">Debe seleccionar año menor</option> 
            <outgroup label="yyy">
            @foreach ($balances as $balance)
           <option value="{{$balance->fecha_final}}">{{$balance->fecha_final}}</option>
              @endforeach
              </outgroup>
          </select>
          
      </div>

 

      <div class="col">
          <label for="fecha_final" class="control-label">Años Analizar</label><br>
          <select class="form-control" id="fecha_final" name="fecha_final" required="true">
            <option value="">Debe seleccionar año mayor</option> 
            @foreach ($balances as $balance)
           <option value="{{$balance->fecha_final}}">{{$balance->fecha_final}}</option>
              @endforeach
          </select>
      </div>


     
  </div>


</div>



<div class="form-group">
  
      <div class="form-group">                                  
          <button type="submit" class="btn btn-primary btn-sm">Analizar Balance General</button> 
      </div>
     
 
</div>


</form>
            </div>
      </div>
      </div>
      </div>
      </div>
@endsection
            