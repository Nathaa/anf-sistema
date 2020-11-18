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
									
									<td>{{$b1->nombre}}</td>
									<td>${{$b1->monto}}</td>
									<td>${{$b2->monto}}</td>
										
									@php
										$diferencia = $b2->monto - $b1->monto;

										if($b1->monto>0){
											$porcentaje = round((($diferencia/$b1->monto) * 100) ,2);
										}else{
											$porcentaje = 100;
										}

									@endphp	

									<td>#</td>
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