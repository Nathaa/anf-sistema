{{ $Modo=='crear' ? 'Agregar Cuenta a Catalogo':'Modificar Cuenta de Catalogo' }}<br>
<label for="codigo">{{'Codigo'}}:</label><br>
<input type="text" id="codigo" name="codigo" value="{{ isset($cuentas->codigo)?$cuentas->codigo:'' }}"><br>

<label for="codigo_padre">{{'Codigo Precedente'}}:</label><br>
<input type="text" id="codigo_padre" name="codigo_padre" value="{{ isset($cuentas->codigo_padre)?$cuentas->codigo_padre:'' }}"><br>

<label for="nombre">{{'Nombre'}}:</label><br>
<input type="text" id="nombre" name="nombre" value="{{ isset($cuentas->nombre)?$cuentas->nombre:'' }}"><br>

<label for="descripcion">{{'Descripcion'}}:</label><br>
<input type="text" id="descripcion" name="descripcion" value="{{ isset($cuentas->descripcion)?$cuentas->descripcion:'' }}"><br>

<label for="empresas_id">{{'Empresa'}}:</label><br>
<input type="text" id="empresas_id" name="empresas_id" value="{{ isset($cuentas->empresas_id)?$cuentas->empresas_id:'' }}"><br>

<label for="tipocuentas_id">{{'Tipo de cuenta'}}:</label><br>
<input type="text" id="tipocuentas_id" name="tipocuentas_id" value="{{ isset($cuentas->tipocuentas_id)?$cuentas->tipocuentas_id:'' }}"><br>

<input type="submit" value="Modificar">
<a href="{{ url('cuentas') }}">Regresar</a>
