@extends('template.plantilla2')
@section('content')

<?php 
$valor1=$valant;
$valor2=$valact;
$conexion=mysqli_connect('localhost','root','','sistema_academico');

?>

<h1>Analisis Horizontal</h1>
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

 $sql = "SELECT c.nombre AS nom, c.monto AS valor_Actual, b.monto As valor_anterior, c.monto-b.monto AS variacion From resultados c, resultados b WHERE c.fecha_final='$valor2' AND b.fecha_final='$valor1' AND c.nombre=b.nombre";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
$a=$mostrar['valor_anterior'];
$b=$mostrar['variacion'];
$c=$b/$a;
$d=$c*100;
$e=round($d,2);
?>

<tr>
<td><?php echo $mostrar['nom']?></td>
<td><?php echo $mostrar['valor_anterior']?></td>
<td><?php echo $mostrar['valor_Actual']?></td>
<td><?php echo $mostrar['variacion']?></td>
<td><?php echo $e?>%</td>

<?php
if($mostrar['nom']=='UTILIDAD BRUTA'){
$ut= $e;
}
if($mostrar['nom']=='UTILIDAD DE OPERACION'){
      $utop= $e;
}
if($mostrar['nom']=='VENTAS NETAS'){
      $vn= $e;
}
?>

</tr>

<?php
}
?>

</tbody>

    
</table>
<h2>Resultados</h2>
<table>
      <tr bgcolor="#FFFFFF">
      <?php    
      if($ut>0){
?>
<td><?php 
echo "La empresa tuvo un incremento favorable de $ut% en la utilidad bruta,lo cual indica que los cambios realizados en
los precios de venta, los volumens de produccion  y los costos de compra han sido acertivos.";
?></td>
<?php
      }elseif($ut<0){
?>
<td><?php
echo "La empresa tuvo un decrecimiento del $ut% respecto al periodo anteior, por lo que se recomienda evaluar los precios y el volumen de ventas
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
 echo "El incremento de $utop% en los gastos operativos fue acertivo, pues las ventas incrementaron un $vn%";
 ?></td>
 <?php
}?></tr>
</table>
@endsection