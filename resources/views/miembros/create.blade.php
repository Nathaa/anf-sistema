@extends('template.plantilla2')



@section('content')

<div class="container">

@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <div class="card">

    
     <div class="card-body">
       
        
        
        <table class="table table-bordered table-hover">

                

    <form action="{{ route ('miembros.store') }}" method="POST" role="form" id="formulario">

            {{ csrf_field() }}

            

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre del analista" id="nombre" required="true">
               

            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="email" value="" class="form-control" placeholder="Correo del analista" id="correo" required="true">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" value="" class="form-control" placeholder="Contrasena" id="password" required="true">
            </div>

            <div class="form-group">
                  <label for="rol">Rol</label>
                <select name="rol" class="form-control">

                       <option value="Analista">Analista</option>
                       
                </select>
             

            </div>

            <div class="form-group">

                <label for="admin">Administrador</label>

               <select name="admin" class="form-control">
                       <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                       
                </select>
             

            </div>

      
            
            <div class="form-group">
            <button class="btn btn-primary" type="submit" id="btn_submit"> Guardar </button>
            <a class="btn btn-primary" href="{{ url()->previous() }}">Regresar</a>
            </div>

    </form>

   
        </table>
        </div>
    </div>
</div>
@endsection
