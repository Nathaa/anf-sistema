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
									<th class="table-primary" colspan="3">Balance</th>
									<th class="table-info" colspan="2">Vertical</th>
								</tr>

								<tr>

									<th>Cuenta</th>
									<th>{{$year1}}</th>
									<th>{{$year2}}</th>
									<th>{{$year1}}</th>
									<th>{{$year2}}</th>
								</tr>

							</thead>		


							<tbody>
								@foreach($balance1 as $b1)
								@foreach($balance2 as $b2)
								@if($b1->nombre==$b2->nombre)
								<tr>
									
									@if($b1->nombre == 'ACTIVO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>

									@php

										$activo1 = $b1->monto;

									@endphp


									@elseif($b1->nombre == 'PASIVO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									@elseif($b1->nombre == 'PATRIMONIO')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									@else
									<td>{{$b1->nombre}}</td>
									@endif
									
									<td>${{$b1->monto}}</td>
									<td>${{$b2->monto}}</td>
										
									@php
										
										$vertical = round((($b1->monto/$activo1)*100), 2);

									@endphp	

									@if($b1->nombre == 'ACTIVO CORRIENTE')

										<td>{{$vertical}}%</td>										
									@else
									<td>#</td>
									@endif
									<td>#</td>
									
								</tr>
								@endif
								@endforeach
								@endforeach
							</tbody>

						</table>


					</div>




			</div>


		</div>


	</div>


@endsection