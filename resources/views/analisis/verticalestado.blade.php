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
									<th class="table-primary" colspan="2">Estado de Resultados</th>
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

									@if($b1->nombre == 'VENTAS NETAS' || $b1->nombre == 'UTILIDAD BRUTA' || $b1->nombre == 'UTILIDAD DE OPERACION' || $b1->nombre == 'UTILIDADES ANTES DE PART E IMP' || $b1->nombre == 'UTILIDAD (PERDIDA) NETA')
									<td class="font-weight-bold">{{$b1->nombre}}</td>
									<td class="font-weight-bold">${{$b1->monto}}</td>
									<td class="font-weight-bold">{{ round((($b1->monto/$ventas)*100) ,2) }}%</td>
							
									@else
									<td>{{$b1->nombre}}</td>
									<td>${{$b1->monto}}</td>
									<td>{{ round((($b1->monto/$ventas)*100) ,2) }}%</td>
									@endif	

								</tr>
								@endforeach
							</tbody>

						</table>

					</div>

			</div>


		@if($costoventas<$ventas)
		<div class="card border-success">
  			<div class="card-header border-success text-success font-weight-bold">Conclusión</div>
  				<div class="card-body text-success">
    				<h5 class="card-title">
    				Con una diferencia de ${{$ventas-$costoventas}}, las ventas de la empresa son superiores a los costos, los cuales equivalen al {{ round((($costoventas/$ventas)*100) ,2) }}% de su totalidad.  
    				Como resultado final se obtienen unas utilidades brutas de ${{$utilidadB}} que reflejan un {{ round((($utilidadB/$ventas)*100) ,2) }}% de las ventas netas.

    			</h5>
  				</div>
		</div>
		@elseif($costoventas>$ventas)
		<div class="card border-danger">
  			<div class="card-header border-danger text-danger font-weight-bold">Conclusión</div>
  				<div class="card-body text-danger">
    				<h5 class="card-title">	
    				Con una diferencia de ${{$ventas-$costoventas}}, las ventas de la empresa son inferiores a los costos, los cuales equivalen al {{ round((($costoventas/$ventas)*100) ,2) }}% de su totalidad.  
    				Como resultado final se obtienen unas utilidades brutas de ${{$utilidadB}} que reflejan un {{ round((($utilidadB/$ventas)*100) ,2) }}% de las ventas netas. Se recomienda evaluar la distribución de gastos y las estrategias de ventas.
    				</h5>
  				</div>
		</div>
		@endif
		

	</div>
</div>

@endsection