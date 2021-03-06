@extends('template.plantilla2')
@section('content')
<div class="container">

		<div class="container-fluid">

			<div class="card">

				<div class="card-header"> <h6 class="card-title text-primary font-weight-bold">Análisis horizontal de la Empresa {{$empresa->nombre}}</h6></div>

					<div class="card-body">
<?php 
$valor1=$valant;
$valor2=$valact;
$conexion=mysqli_connect('localhost:3306','root','','anf');

?>

<h2>Balance General</h2>

<table class="table table-bordered thead-dark table-hover table-sm" id="demo">


 <tr>
 <th>Cuenta</th>
 <th>{{$valor1}}</th>
 <th>{{$valor2}}</th>
 <th>Variación Absoluta</th>
 <th>Variación relativa</th>
</tr>
 </thead>
<tbody>


<?php

 $sql = "SELECT c.nombre AS nom, c.monto AS valor_Actual, b.monto As valor_anterior, c.monto-b.monto AS variacion From balances c, balances b,cuentas d WHERE c.fecha_final='$valor2' AND b.fecha_final='$valor1' AND c.nombre=b.nombre AND b.cuentas_id=d.id AND d.empresas_id='$ide'";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
$a=$mostrar['valor_anterior'];
$b=$mostrar['variacion'];
$c=$b/$a;
$d=$c*100;
$e=round($d,2);
//$e=1;
?>

<tr>
<?php if($mostrar['nom'] == "ACTIVO" || $mostrar['nom'] == "ACTIVO CORRIENTE" || $mostrar['nom'] == "ACTIVO NO CORRIENTE"
                   || $mostrar['nom'] == "PASIVO" || $mostrar['nom'] == "PASIVO CORRIENTE" || $mostrar['nom'] == "PASIVO NO CORRIENTE"
                   || $mostrar['nom'] == "PATRIMONIO"){ ?>
<td style="font-weight:bold;"><?php echo $mostrar['nom']?></td>
<td style="font-weight:bold;"><?php echo $mostrar['valor_anterior']?></td>
<td style="font-weight:bold;"><?php echo $mostrar['valor_Actual']?></td>
<td style="font-weight:bold;"><?php echo $mostrar['variacion']?></td>
<td style="font-weight:bold;"><?php echo $e?>%</td>
              <?php }else{ ?>
              
<td><?php echo $mostrar['nom']?></td>
<td><?php echo $mostrar['valor_anterior']?></td>
<td><?php echo $mostrar['valor_Actual']?></td>
<td><?php echo $mostrar['variacion']?></td>
<td><?php echo $e?>%</td>
<?php
              }
if($mostrar['nom']=='ACTIVO'){
$act= $e;
}
if($mostrar['nom']=='PASIVO'){
      $pas= $e;
      }
if($mostrar['nom']=='PATRIMONIO'){
      $pat= $e;
      }


?>

</tr>

<?php
}
?>

</tbody>

    
</table>
</div>
</div>
<div class="card border-info">
  			<div class="card-header border-info text-info font-weight-bold">Resultados</div>
  				<div class="card-body text-info">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr bgcolor="#FFFFFF">
<?php
if($act>0){
?>
<td><?php echo "La empresa logro un crecimiento  de <strong>$act%</strong> de un período a otro, lo cual puede indicar que hubo aumento en las ventas o que los cambios realizados para la ejeucion de estas fueron acertivos.";
?></td>
<?php
}elseif($act==0){
?>
<td><?php echo "La empresa no tuvo ningún crecimiento a lo largo del período, por lo que se recomienda evaluar las estrategias actuales de ventas.";
?></td>
<?php
}else{
?>
<td><?php echo "La disminución del activo de la empresa en un <strong>$act%</strong>,implica que la empresa esta teniendo pérdidas duarante su ejercicio, por lo que se recomienda que revalue sus politicas de ventas y cobranzas para el siguiente periodo";
?></td>
<?php
}
?>
</tr>
<tr bgcolor="#FFFFFF">
<?php
if($pas>0){
?>
<td><?php echo "El aumento de <strong>$pas%</strong>en los  pasivo indica que la empresa se encuentra en una buena posición económica y que  puede disponer de credito adicional , por parte de los acreedores.
";
?></td>
<?php
}elseif($pas<0){
?>
<td><?php echo "La empresa decreció un <strong>$pas%</strong> de un período a otro, la disminución en los pasivos implica que se estan utilizando fondos para amortizar o cancelar cuentas de los acreedores.
";
?></td>
<?php
}
?>
</tr>
<tr bgcolor="#FFFFFF">
<?php
if($pat>0){
?>
<td><?php echo "El <strong>$pat%</strong> que creció el patrimonio de la empresa respecto al período anteriror, puede ser un indicio de que la empresa está generando beneficios y creando valor para sus accionistas o bien que esta emitiendo nuevas acciones.
";
?></td>
<?php
}elseif($pat<0){
?>
<td><?php echo "La disminución del patrimonio en un <strong>$pat%</strong> implica una reducción en los fondos propios de la empresa, lo que implicaria que se uso capital social para hacer frente a las obligaciones de la empresa.
";
?></td>
<?php
}
?>
</tr>
</table>
</div>
</div>
</div>
</div>
      
@endsection