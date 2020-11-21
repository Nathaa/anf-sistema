@extends('template.plantilla2')
@section('content') 


	<div class="container">

		<div class="container-fluid">

			<div class="card">

				<div class="card-header"> <h6 class="card-title text-primary font-weight-bold">Análisis vertical de la Empresa {{$empresa->nombre}}</h6></div>

					<div class="card-body">

						<table class="table table-hover table-bordered">

							<thead>

								<tr>
									<th class="table-primary" colspan="2">Balance General</th>
									<th class="table-info" colspan="1">Análisis Vertical</th>
								</tr>

								<tr>

									<th>Cuenta</th>
									<th>{{$year1}}</th>
									<th>{{$year1}}</th>
								</tr>

							</thead>		

							<tbody>


								@foreach($balance1 as $b1)
								<tr>					

									@if($b1->nombre == 'ACTIVO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									<td class="font-weight-bold">${{$b1->monto}}</td>

									@php
										if($b1->monto>0)
										$activo1 = $b1->monto;
										else
										$activo1 = 0.000001;
									@endphp

									@elseif($b1->nombre == 'PASIVO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									<td class="font-weight-bold">${{$b1->monto}}</td>
									@php
										if($b1->monto>0)
										$pasivo1 = $b1->monto;
										else
										$pasivo1 = 0.000001;
									@endphp

									@elseif($b1->nombre == 'PATRIMONIO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									<td class="font-weight-bold">${{$b1->monto}}</td>

									@php
										if($b1->monto>0)
										$patrimonio = $b1->monto;
										else
										$patrimonio = 0.000001;
									@endphp

									@elseif($b1->nombre == 'ACTIVO CORRIENTE' || $b1->nombre == 'ACTIVO NO CORRIENTE' || $b1->nombre == 'PASIVO NO CORRIENTE' || $b1->nombre == 'PASIVO CORRIENTE')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									<td class="font-weight-bold">${{$b1->monto}}</td>

									@else
									<td>{{$b1->nombre}}</td>
									<td>${{$b1->monto}}</td>

									@endif					


									@if($b1->nombre == 'ACTIVO' || $b1->nombre == 'ACTIVO CORRIENTE' || $b1->nombre == 'ACTIVO NO CORRIENTE')

									<td class="font-weight-bold">{{round((($b1->monto/$activo1)*100),2)}}%</td>	

									@elseif($b1->nombre == 'CAJA Y BANCOS' || $b1->nombre == 'MAQUINARIA Y EQUIPO')

									<td>{{round((($b1->monto/$activo1)*100),2)}}%</td>	

									@elseif($b1->nombre == 'PASIVO CORRIENTE' || $b1->nombre == 'PASIVO' || $b1->nombre == 'PASIVO NO CORRIENTE')

									<td class="font-weight-bold">{{round((($b1->monto/$pasivo1)*100),2)}}%</td>


									@elseif($b1->nombre == 'DEUDAS A CORTO PLAZO' || $b1->nombre == 'DEUDAS A LARGO PLAZO')	

									<td>{{round((($b1->monto/$pasivo1)*100),2)}}%</td>

									@elseif($b1->nombre == 'PATRIMONIO')

									<td class="font-weight-bold">{{round((($b1->monto/$patrimonio)*100),2)}}%</td>

									@elseif($b1->nombre == 'CAPITAL')

									<td>{{round((($b1->monto/$patrimonio)*100),2)}}%</td>
									@endif
								</tr>
								@endforeach
							</tbody>

						</table>

					</div>

			</div>



		<div class="card border-info">
  			<div class="card-header border-info text-info font-weight-bold">Conclusión</div>
  				<div class="card-body text-info">
    				<h5 class="card-title">
    				@if($activoCorriente>$pasivoCorriente)
    				El ACTIVO CORRIENTE que representa el {{round((($activoCorriente/$activo1)*100),2)}}% del ACTIVO total supera al pasivo corriente que representa el {{round((($pasivoCorriente/$pasivo1)*100),3)}}% del total de pasivos.
    				<br>
    				En este año la proproción entre ambos es de {{round(($activoCorriente/$activo1)/($pasivoCorriente/$pasivo1),2)}}. 


    				@elseif($activoCorriente<$pasivoCorriente)

    				El ACTIVO CORRIENTE que representa el {{round((($activoCorriente/$activo1)*100),2)}}% del ACTIVO total NO supera al pasivo corriente que representa el {{round((($pasivoCorriente/$pasivo1)*100),3)}}% del total de pasivos.
    				<br>
    				En este año la proproción entre ambos es de {{round(($activoCorriente/$activo1)/($pasivoCorriente/$pasivo1),2)}}. 
    				Se recomienda analizar las cuentas de pasivo.

    				@elseif($activoCorriente == $pasivoCorriente)

    				El ACTIVO CORRIENTE que representa el {{round((($activoCorriente/$activo1)*100),2)}}% del ACTIVO total es igual al pasivo corriente que representa el {{round((($pasivoCorriente/$pasivo1)*100),3)}}% del total de pasivos.
    				<br>
    				Se recomienda evaluar las inversiones de la empresa, no se reflejan activos superiores.

    				@endif

    			</h5>
  				</div>
		</div>
		
		</div>

	</div>

@endsection