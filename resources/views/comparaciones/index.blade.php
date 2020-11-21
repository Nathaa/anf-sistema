@extends('template.plantilla2')

@section('content')

<div class="container-fluid">
    <div class="card">
     

      @if(!Auth::user()->rol == 'Analista')
        @php
          $id = Auth::user()->id;
        @endphp
      @else

        @php
          $id = Auth::user()->empresas;
        @endphp
        @endif

        <div class="card-body">
            <div class="form-group row">
                
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>
           <th scope="col">Empresa</th>
          
         </tr>
    </thead>
       <tbody>
        @foreach ($empresas as $empresa)
            
        
        <tr>
            <td>{{$empresa->nombre}}</td>
        </tr>
        <tr>
            
            <div align="left">
          
                
                <a href="{{ url('/comparaciones/'.$empresa->id) }}" > <button type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>Comparar ratios financieros de acuerdo al rubro perteneciente </button> </a>
                  </a>
               
                  <br>
                  <br>
            </div>
    
        </tr>
        @endforeach
            </tbody>
    </table>
      <br>
     
            </div>
    </div>
</div>
@endsection