@extends('layouts.app')

@section('content')
	
	<h3><b>Pagina Amministratore</b></h3>
	
	<table class="table table-bordered">
		<tr>
			<td>ID INGREDIENTE</td>
			<td>NOME</td>
			<td>MODIFICA</td>
		</tr>

		<tr>
			<td>{{$ingred->id}}</td>
			<td>{{$ingred->name}}</td>
			{!! Form::open(['url'=>'modifica/ingred/'.$ingred->id,'method'=>'put']) !!}
			<td>{!! Form::text('name', $ingred->name) !!}</td>
			<td>{!! Form::submit('Modifica',['class'=>'btn btn-warning right margin-right-20p']) !!}</td>
			{!! Form::close() !!}				
		</tr>
	
	</table>
	
	<p class="margin-top-20">
		<a href="{{route('admin.home')}}" class="btn btn-primary" role="button">Torna a Home Admin</a>
	</p>
		
   
@endsection
