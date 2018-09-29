@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			@foreach($estudiantes as $es)
				@if($es->es_idEstudiante==$calificaciones->ca_idEstudianteFK)
					<h3>Editar Nota del Estudiante: {{$es->es_nombre}} {{$es->es_apellido}}</h3>
				@endif
			@endforeach
			@include('errores/errores')
		</div>
	</div>
	@php($cont=0)
	@php($est=0)
	@php($mat=0)
			{!!Form::model($calificaciones,['method'=>'PATCH','route'=>['calificaciones.update',$calificaciones->ca_idCalificacion]])!!}
			{{Form::token()}}
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="periodo">Elija el Periodo</label>
					<select name="ca_idPeriodoFK" id="{{ $calificaciones->ca_idPeriodoFK }}" class="form-control" required>
						<option value="0">Elije una opción</option>
						@foreach($periodos as $periodo)
						@if($periodo->pe_idPeriodo==$calificaciones->ca_idPeriodoFK)
						<option value="{{$periodo->pe_idPeriodo}}" selected>{{$periodo->pe_nombre}}</option>
						@else
						<option value="{{$periodo->pe_idPeriodo}}">{{$periodo->pe_nombre}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="ca_anioCalificacion">Elija el Año</label>
					<select name="ca_anioCalificacion" id="ca_anioCalificacion" class="form-control" required>
						<option value="0">Elije una opción</option>
						@if($calificaciones->ca_idPeriodoFK==date('Y'))
						<option value={{ date('Y') }} selected>2018</option>
						@else
						<option value={{ date('Y') }} selected>2018</option>
						@endif
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div>
							<div class="table-responsive">
							<h1>Calificaciones por Competencias</h1>
							<!--class="table table-striped table-bordered table-condensed table-hover"-->
							<table class="table table-striped table-bordered table-condensed table-hover text-center">
								<thead>
									<!--Calificaciones-->
									<th>Estudiante</th>
									<th>Materia</th>
									<th>Proceso</th>
									<th>Competencia</th>
									<th>Nota Competencia</th>
								</thead>
								<tbody>
									@foreach($estudiantes as $es)
										@if($es->es_idEstudiante==$calificaciones->ca_idEstudianteFK)
											<th class="text-center" scope="row">
												<input type="hidden" name="ca_idEstudianteFK" value="{{ $calificaciones->ca_idEstudianteFK }}">
												{{ $es->es_nombre }} {{ $es->es_apellido }}
											</th>
										@endif
									@endforeach

									@foreach($materias as $ma)
										@if($ma->ma_idMateria==$calificaciones->ca_idMateriaFK)
										<th class="text-center" scope="col">
											<input type="hidden" name="ca_idMateriaFK" value="{{ $calificaciones->ca_idMateriaFK}}">
											{{ $ma->ma_nombre }}
										</th>
										@endif
									@endforeach	

									@foreach($procesos as $pro)
										@if($pro->pro_idProceso==$calificaciones->ca_idProcesoFK)
											<th class="text-center" scope="col">
												<input type="hidden" name="ca_idProcesoFK" value="{{ $calificaciones->ca_idProcesoFK }}">
												{{ $pro->pro_nombre }}
											</th>
										@endif
									@endforeach	

									@foreach($competencias as $co)
										@if($co->co_idCompetencia==$calificaciones->ca_idCompetenciaFK)
											<th class="text-center" scope="col">
												<input type="hidden" name="ca_idCompetenciaFK" value="{{ $calificaciones->ca_idCompetenciaFK }}">
												1° <span class="glyphicon glyphicon-info-sign" title="{{ $co->co_descripcion }}"></span>
											</th>
										@endif
									@endforeach

									<td class="text-center">
										<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11" style="text-align:center;">
											<div class="form-group">
												<select name="ca_idNotaFK" id="ca_idNotaFK" class="se3 text-center">
													@foreach($notas as $nt)
													@if($nt->no_idNota==$calificaciones->ca_idNotaFK)
													<option value="{{$nt->no_idNota}}" selected>{{$nt->no_nombre}}</option>
													@else
													<option value="{{$nt->no_idNota}}">{{$nt->no_nombre}}</option>
													@endif
													@endforeach
												</select>
											</div>
										</div>
									</td>		
								</tbody>									
							</table>
						</div>
						<br>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<button class="btn btn-primary" type="sumbmit">Agregar</button>
					<button class="btn btn-danger" type="reset">Borrar</button>
				</div>
			</div>
			{!!Form::close()!!}
@endsection