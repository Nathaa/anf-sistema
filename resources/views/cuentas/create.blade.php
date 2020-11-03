<form action="{{ url('/cuentas') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <label for="codigo">{{'Codigo'}}:</label><br>
  <input type="text" id="codigo" name="codigo" value=""><br>
  <label for="codigo_padre">{{'Codigo Precedente'}}:</label><br>
  <input type="text" id="codigo_padre" name="codigo_padre" value=""><br>
  <label for="nombre">{{'Nombre'}}:</label><br>
  <input type="text" id="nombre" name="nombre" value=""><br>
  <label for="descripcion">{{'Descripcion'}}:</label><br>
  <input type="text" id="codigo_padre" name="descripcion" value=""><br>
  <label for="empresas_id">{{'Empresa'}}:</label><br>
  <input type="text" id="empresas_id" name="empresas_id" value=""><br>
  <label for="tipocuentas_id">{{'Tipo de cuenta'}}:</label><br>
  <input type="text" id="tipocuentas_id" name="tipocuentas_id" value=""><br>

  <input type="submit" value="Agregar">
</form>