@extends('template.plantilla2')
@section('content')
<?php 

$conexion=mysqli_connect('localhost','root','','sistema_academico');

?>

<h1>Analisis Horizontal</h1>
<table class="table table-bordered thead-dark table-hover table-sm" id="demo">


 <tr>
 <th>Cuenta</th>
 <th>Valor Anterior</th>
 <th>Valor Actual</th>
 <th>Variacion Absoluta</th>
 <th>Variacion relativa</th>
</tr>
 </thead>
<tbody>


<?php
$valor1='2020-10-01';
$valor2='2020-11-30';
 $sql = "SELECT c.nombre AS nom, c.monto AS valor_Actual, b.monto As valor_anterior, c.monto-b.monto AS variacion From balances c, balances b WHERE c.fecha_final='$valor2' AND b.fecha_inicio='$valor1' AND c.nombre=b.nombre";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
$a=$mostrar['valor_anterior'];
$b=$mostrar['variacion'];

?>

<tr>
<td><?php echo $mostrar['nom']?></td>
<td><?php echo $mostrar['valor_anterior']?></td>
<td><?php echo $mostrar['valor_Actual']?></td>
<td><?php echo $mostrar['variacion']?></td>



</tr>

<?php
}
?>

</tbody>

    
      </table>
<h2>Resultados</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr bgcolor="#FFFFFF">
<td>Ponga aqui el contenido del cuadro</td>
</tr>
</table>
      
@endsection