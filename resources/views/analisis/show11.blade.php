@extends('template.plantilla2')
@section('content')
<div class="container">

		<div class="container-fluid">

			<div class="card">

				<div class="card-header"> <h6 class="card-title text-primary font-weight-bold">Análisis horizontal de la Empresa {{$empresa->nombre}}</h6></div>

					<div class="card-body">
<?php 
$ut=1;
$utop=0;
$vn=0;
$valor1=$valant;
$valor2=$valact;
$conexion=mysqli_connect('localhost:3306','root','','anf');

?>

<h2>Estado de Resultado</h2>
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

$sql = "SELECT c.nombre AS nom, c.monto AS valor_Actual, b.monto As valor_anterior, c.monto-b.monto AS variacion From resultados c, resultados b,cuentas d WHERE c.fecha_final='$valor2' AND b.fecha_final='$valor1' AND c.nombre=b.nombre AND b.cuentas_id=d.id AND d.empresas_id='$ide'";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
$a=$mostrar['valor_anterior'];
$b=$mostrar['variacion'];
$c=$b/$a;
$d=$c*100;
$e=round($d,2);
?>

<tr>
<?php if($mostrar['nom'] == "UTILIDAD BRUTA" || $mostrar['nom'] == "UTILIDAD DE OPERACION" || $mostrar['nom'] == "UTILIDADES ANTES DE PART E IMP"
                   || $mostrar['nom'] == "UTILIDAD (PERDIDA) NETA"){ ?>
<td style="font-weight:bold;"><?php echo $mostrar['nom']?></td>
<td style="font-weight:bold;"><?php echo $mostrar['valor_anterior']?></td>
<td style="font-weight:bold;"><?php echo $mostrar['valor_Actual']?></td>
<td style="font-weight:bold;"><?php echo $mostrar['variacion']?></td>
<td style="font-weight:bold;"><?php echo $e?>%</td>
<?php
                  if($mostrar['nom']=='UTILIDAD BRUTA'){
                        $ut= $e;
                        }
                  if($mostrar['nom']=='UTILIDAD DE OPERACION'){
                        $utop= $e;
                        }

               }else{ ?>
<td><?php echo $mostrar['nom']?></td>
<td><?php echo $mostrar['valor_anterior']?></td>
<td><?php echo $mostrar['valor_Actual']?></td>
<td><?php echo $mostrar['variacion']?></td>
<td><?php echo $e?>%</td>

<?php
 if($mostrar['nom']=='VENTAS NETAS'){
      $vn= $e;
      }
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
      if($ut>0){
?>
<td><?php 
echo "La empresa tuvo un incremento favorable de <strong>$ut%</strong> en la utilidad bruta,lo cual indica que los cambios realizados en
los precios de venta, los volumens de produccion  y los costos de compra han sido acertivos.";
?></td>
<?php
      }elseif($ut<0){
?>
<td><?php
echo "La empresa tuvo un decrecimiento del <strong>$ut%</strong> respecto al periodo anteior, por lo que se recomienda evaluar los precios y el volumen de ventas
para solventar el problema. ";
?></td>
<?php
  }?>
</tr>
<tr bgcolor="#FFFFFF">
<?php
if($utop>0 && $utop>$vn){
?>
<td><?php
echo "El aumento en los gastos de operación no se refleja en las ventas obtenidas, por lo que es necesario reevaluar las politicas y los gasto de ventas. ";
?></td>
<?php
}elseif($utop>0 && $vn>0 && $utop<$vn){
?>
 <td><?php
 echo "El incremento de <strong>$utop%</strong> en los gastos operativos fue acertivo, pues las ventas incrementaron un <strong>$vn%</strong>";
 ?></td>
 <?php
}?></tr>
</table>
</div>
</div>
</div>
</div>
@endsection