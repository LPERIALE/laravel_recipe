@extends('layouts.app')

@section('content')
	
	<h3><b>Pagina Amministratore</b></h3>
	<h4>UTENTI REGISTRATI</h4>
	
	<table class="table table-bordered">
		<tr>
			<td>USER ID</td>
			<td>NOME</td>
			<td>EMAIL</td>
			<td>ADMIN</td>
			<td colspan="3">MODIFICA DATI</td>
		</tr>
		
		@foreach ($users as $user)

				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
				@if($user->isAdmin==1)
					<td>Sì</td>
				@else
					<td></td>
				@endif
			
				@if ($user->isAdmin == 0 || $user->id != Auth::user()->id)
					<td><a href="{{route('modifyUser',['user_id'=>$user->id])}}" class="btn btn-primary" role="button">Modifica</a></td>
					<td><a href="{{route('deleteUser',['user_id'=>$user->id])}}" class="btn btn-danger" role="button">Elimina</a></td>
				@else
					<td colspan="2"></td>
				@endif
				
				</tr>
		@endforeach
	
	</table>
	
	
	<h4>INGREDIENTI MEMORIZZATI</h4>
	
	<table class="table table-bordered">
		<tr>
			<td>ID INGREDIENTE</td>
			<td>NOME</td>
			<td>MODIFICA</td>
			<td>ELIMINA</td>
		</tr>
		
		@foreach ($ingreds as $ingred)

				<tr>
					<td>{{$ingred->id}}</td>
					<td>{{$ingred->name}}</td>
					<td><a href="{{route('modifyIngred',['ingred_id'=>$ingred->id])}}" class="btn btn-primary" role="button">Modifica</a></td>				
					<td><a href="{{route('deleteIngred',['ingred_id'=>$ingred->id])}}" class="btn btn-danger" role="button">Elimina</a></td>				
				</tr>
				
		@endforeach
	
	</table>
		
   
@endsection
		
   

