@extends('layouts.app')

@section('content')
	
	<h3><b>Pagina Amministratore</b></h3>

	{!! Form::open(['url'=>'admin/user/'.$user->id,'method'=>'put']) !!}
	
	<table class="table table-bordered width-80">
		<tr>
			<td>DATO</td>
			<td>VALORE</td>
			<td>MODIFICA</td>
		</tr>

		<tr>
			<td><b>Nome</b></td>
			<td>{{$user->name}}</td>
			<td>{!! Form::text('name', $user->name) !!}</td>
		</tr>
		
		<tr>
			<td><b>Email</b></td>
			<td>{{$user->email}}</td>
			<td>{!! Form::text('email',$user->email) !!}</td>
	</table>
			{!! Form::submit('Modifica',['class'=>'btn btn-warning right margin-right-20p']) !!}</td>
			{!! Form::close() !!}	

	<p class="margin-top-20">
		<a href="{{route('admin.home')}}" class="btn btn-primary" role="button">Torna a Home Admin</a>
	</p>
		
   
@endsection
