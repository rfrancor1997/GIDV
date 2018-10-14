<!DOCTYPE html>
<html>
<head>
	@foreach($estudiantes as $es)
	 	@if($ess==$es->es_idEstudiante)
			<title>Boletin Estudiante {{ $es->es_nombre }} {{ $es->es_apellido }}</title>							
		@endif
	@endforeach
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="'css/estilos.css'">

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

th {
    border: 1px solid #000000;
    text-align: left;
    padding: 8px;
    background-color:rgb(146,208,80);
}

td{
    border: 1px solid #000000;
    text-align: left;
    padding: 2px;
    font-size: 12px;
}

th:nth-child(even) {
    background-color:rgb(146,208,80);
}

th:nth-child(6) {
    background-color:rgb(0,112,192);
}
</style>

</head>
<body>
<div class="row"><!--Primera linea con la foto-->
	<div id="rectangle">
		<div id="rectangle2">
		 	@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<img src="C:Users/Ricardo/Desktop/TesisLaravel/GIDV/public/imagenes/fotosEstudiantes/{{ $es->es_fotoEstudiante }}" alt="{{ $es->es_nombre}}" height="100px" width="110px" class="img-thumbnail" hspace="20">							
				@endif
			@endforeach
		 </div>
		 <div id="espacio">
		</div>
		 <div id="rectangle1">
		 	<p><b>REGISTRO ESCOLAR DE EVALUACIÓN {{$anio}}</b></p>
			@foreach($users as $us)
				@foreach($estudiantes as $es)
				 	@if($ess==$es->es_idEstudiante && $es->es_idCursoFK == $us->us_idCursoFK)
						<p>Docente: {{ $us->name }} {{ $us->us_apellido }}</p>							
					@endif
				@endforeach
			@endforeach
		 </div>
	</div>	
	<style> #rectangle {width:auto; height:110px; background:none;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle1 {width:200px; height:80px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle2 {width:100px; height:125px; background:none;float: right;text-align: center; overflow: hidden;}</style>
     <style>
     #espacio {width:2px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row">
	<div id="espacios">
	</div>
<style>#espacios {width:auto; height:2px; background:none;text-align: center; overflow: hidden;}</style>
<div class="row"><!--Segunda linea con datos del estudiante-->
	<div id="rectanglee">
		<div id="rectanglee1">
		 	@foreach($perio as $pe)
			 	@if($pe->pe_idPeriodo==$perEs)
			 	<p><b>Periodo:</b> {{ $pe->pe_idPeriodo }}</p>
			 	@endif
		 	@endforeach
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<p><b>Jornada:</b> {{ $es->es_jornada }}</p>							
				@endif
			@endforeach
		</div>
		<div id="espacio">
		</div>
		<div id="rectanglee2">
		 	<p><b>Grado:</b></p>
		 	@foreach($cursos as $cu)
				@foreach($estudiantes as $es)
				 	@if($ess==$es->es_idEstudiante && $es->es_idCursoFK == $cu->cu_idCurso)
						<p>{{ $cu->cu_nombre }}</p>							
					@endif
				@endforeach
			@endforeach
		 </div>
		 <div id="espacio">
		</div>
		<div id="rectanglee3">
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
			 		<p><b>Doc ID: </b>{{ $es->es_numeroDocumento }}</p>
					<p><b>Codigo:</b>{{ $es->es_codigo }}</p>							
				@endif
			@endforeach
		 </div>
		 <div id="espacio2">
		</div>
		<div id="rectanglee4">
		 	<p><b>Estudiante</b></p>
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<p>{{ $es->es_nombre }} {{ $es->es_apellido }}</p>							
				@endif
			@endforeach
		 </div>
		 
	</div>	
	<style> #rectanglee {width:auto; height:80px; background:none;border-radius: 15px;text-align: center; overflow: hidden;}</style>

    <style>
     #rectanglee1 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee2 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee3 {width:130px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: left; overflow: hidden;}</style>

     <style>
     #rectanglee4 {width:285px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #espacio2 {width:30px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Tercera linea con la foto-->
	<div id="rectangleee">
		<p>INTELIGENCIAS   EQUIVALENTE CONCEPTUAL
		@foreach($notas as $no)
				 {{ $no->no_nombre }}={{ $no->no_descripcion }}							
		@endforeach
		</p>
	 </div>	
	<style> #rectangleee {width:auto; height:25px; background:rgb(146,208,80);border-radius: 5px;font-size:14px;font-family: arial, sans-serif;text-align: center; overflow: hidden;border-width:1.5px;  
    border-style:solid;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row">
	<div id="espaciooo">
	</div>
<style>#espaciooo {width:auto; height:5px; background:none;text-align: center; overflow: hidden;}</style>
</div>
@php($cont=0)
@foreach($materias as $ma)
@if($cont==4)
<div class="row"><!--Primera linea con la foto-->
	<div id="rectangle">
		<div id="rectangle2">
		 	@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<img src="C:Users/Ricardo/Desktop/TesisLaravel/GIDV/public/imagenes/fotosEstudiantes/{{ $es->es_fotoEstudiante }}" alt="{{ $es->es_nombre}}" height="100px" width="110px" class="img-thumbnail" hspace="20">							
				@endif
			@endforeach
		 </div>
		 <div id="espacio">
		</div>
		 <div id="rectangle1">
		 	<p><b>REGISTRO ESCOLAR DE EVALUACIÓN {{$anio}}</b></p>
			@foreach($users as $us)
				@foreach($estudiantes as $es)
				 	@if($ess==$es->es_idEstudiante && $es->es_idCursoFK == $us->us_idCursoFK)
						<p>Docente: {{ $us->name }} {{ $us->us_apellido }}</p>							
					@endif
				@endforeach
			@endforeach
		 </div>
	</div>	
	<style> #rectangle {width:auto; height:110px; background:none;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle1 {width:200px; height:80px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle2 {width:100px; height:125px; background:none;float: right;text-align: center; overflow: hidden;}</style>
     <style>
     #espacio {width:2px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Segunda linea con datos del estudiante-->
	<div id="rectanglee">
		<div id="rectanglee1">
		 	@foreach($perio as $pe)
			 	@if($pe->pe_idPeriodo==$perEs)
			 	<p><b>Periodo:</b> {{ $pe->pe_idPeriodo }}</p>
			 	@endif
		 	@endforeach
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<p><b>Jornada:</b> {{ $es->es_jornada }}</p>							
				@endif
			@endforeach
		</div>
		<div id="espacio">
		</div>
		<div id="rectanglee2">
		 	<p><b>Grado:</b></p>
		 	@foreach($cursos as $cu)
				@foreach($estudiantes as $es)
				 	@if($ess==$es->es_idEstudiante && $es->es_idCursoFK == $cu->cu_idCurso)
						<p>{{ $cu->cu_nombre }}</p>							
					@endif
				@endforeach
			@endforeach
		 </div>
		 <div id="espacio">
		</div>
		<div id="rectanglee3">
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
			 		<p><b>Doc ID: </b>{{ $es->es_numeroDocumento }}</p>
					<p><b>Codigo:</b>{{ $es->es_codigo }}</p>							
				@endif
			@endforeach
		 </div>
		 <div id="espacio2">
		</div>
		<div id="rectanglee4">
		 	<p><b>Estudiante</b></p>
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<p>{{ $es->es_nombre }} {{ $es->es_apellido }}</p>							
				@endif
			@endforeach
		 </div>
		 
	</div>	
	<style> #rectanglee {width:auto; height:80px; background:none;border-radius: 15px;text-align: center; overflow: hidden;}</style>

    <style>
     #rectanglee1 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee2 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee3 {width:130px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: left; overflow: hidden;}</style>

     <style>
     #rectanglee4 {width:285px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #espacio2 {width:30px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Tercera linea con la foto-->
	<div id="rectangleee">
		<p>INTELIGENCIAS   EQUIVALENTE CONCEPTUAL
		@foreach($notas as $no)
				 {{ $no->no_nombre }}={{ $no->no_descripcion }}							
		@endforeach
		</p>
	 </div>	
	<style> #rectangleee {width:auto; height:25px; background:rgb(146,208,80);border-radius: 5px;font-size:14px;font-family: arial, sans-serif;text-align: center; overflow: hidden;border-width:1.5px;  
    border-style:solid;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row">
	<div id="espaciooo">
	</div>
<style>#espaciooo {width:auto; height:5px; background:none;text-align: center; overflow: hidden;}</style>
</div>
@else
<div class="row">
<table>
  <tr>
    <th class="text-center">{{ $ma->ma_nombre }}</th>
    @foreach($users as $us)
		@if($us->id == $ma->ma_docenteAsignadoFK)
		<th class="text-center">{{ $us->name }} {{ $us->us_apellido }}</th>
		@endif
	@endforeach
	<th class="text-center" >{{ $ma->ma_intensidad }}h</th>
	<th class="text-center" >NF</th>
	@foreach($notasgenerales as $ng)
		@foreach($notas as $no)
			@if($ng->ng_idEstudianteFK == $ess && $ma->ma_idMateria==$ng->ng_idMateriaFK && $no->no_idNota==$ng->ng_idNotaFK)
			<th class="text-center" >{{ $no->no_descripcion }}</th>
			<th class="text-center" >Fallas</th>
			<th class="text-center" >{{ $ng->ng_fallas }}</th>
			@endif
		@endforeach
	@endforeach
  </tr>	
  	<tr>		  	
  		@foreach($procesos as $pro)
  			@foreach($estudiantes as $es)
	  		@if($es->es_idEstudiante == $ess)
		  		@if($pro->pro_idMateriaFK == $ma->ma_idMateria && $pro->pro_idPeriodoFK == $perEs && $pro->pro_idGradoFK == $es->es_idGradoFK)
					<td colspan="7"><b>PROCESO: {{ $pro->pro_nombre }}</b></td>
				@endif
			@endif
			@endforeach
		@endforeach
	</tr>
		
	@foreach($calificaciones as $ca)
		@if($ca->ca_idEstudianteFK==$ess && $ca->ca_idMateriaFK == $ma->ma_idMateria)
		<tr>
			@foreach($notas as $no)
				@if($no->no_idNota == $ca->ca_idNotaFK)
					<td class="text-center">{{ $no->no_nombre }}</td>
				@endif
			@endforeach
			@foreach($competencias as $co)
				@if($co->co_idCompetencia == $ca->ca_idCompetenciaFK)
					<td colspan="6">{{ $co->co_descripcion }}</td>
				@endif
			@endforeach
		</tr>
		@endif
	@endforeach
</table>
<br>
</div>
@endif
@php($cont++)
@endforeach
</html>