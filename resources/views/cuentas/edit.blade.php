



<form action="{{ url('/cuentas/'.$cuentas->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('cuentas.form',['Modo'=>'editar'])
</form>

