<div id="msj_azul" class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    @endforeach
@endif

  </div>
   