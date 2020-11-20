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
									<th class="table-primary" colspan="2">Balance</th>
									<th class="table-info" colspan="1">Vertical</th>
								</tr>

								<tr>

									<th>Cuenta</th>
									<th>{{$year1}}</th>
									<th>{{$year1}}</th>
								</tr>

							</thead>		

							<tbody>

								@php
									$activo1 = 0;
									$pasivo1 = 0;
									$patrimonio = 0;
								@endphp

								@foreach($balance1 as $b1)
								<tr>					

									@if($b1->nombre == 'ACTIVO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									@php
										$activo1 = $b1->monto;
									@endphp

									@elseif($b1->nombre == 'PASIVO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									@php
										$pasivo1 = $b1->monto;
									@endphp

									@elseif($b1->nombre == 'PATRIMONIO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									@php
										$patrimonio = $b1->monto;
									@endphp

									@else
									<td>{{$b1->nombre}}</td>
									@endif					

									<td>${{$b1->monto}}</td>

									@if($b1->nombre == 'ACTIVO CORRIENTE' || $b1->nombre == 'CAJA Y BANCOS' || $b1->nombre == 'ACTIVO NO CORRIENTE'|| $b1->nombre == 'MAQUINARIA Y EQUIPO' || $b1->nombre == 'ACTIVO')

									<td>{{round((($b1->monto/$activo1)*100),2)}}%</td>	

									@elseif($b1->nombre == 'PASIVO' || $b1->nombre == 'PASIVO CORRIENTE' || $b1->nombre == 'DEUDAS A CORTO PLAZO' || $b1->nombre == 'PASIVO NO CORRIENTE' || $b1->nombre == 'DEUDAS A LARGO PLAZO')	

									<td>{{round((($b1->monto/$pasivo1)*100),2)}}%</td>

									@else

									<td>{{round((($b1->monto/$patrimonio)*100),2)}}%</td>
									@endif
								</tr>
								@endforeach
							</tbody>

						</table>

					</div>

			</div>

		</div>

	</div>

@endsection