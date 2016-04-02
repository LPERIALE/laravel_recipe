@extends('layouts.app')

@section('content')
	
	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
    @endif  
	
	
	<div class="row">
		
		<div class="col-sm-6 col-md-4">
			<h4>Ricerca per ingrediente</h4>
			{!! Form::open(['route'=>'ingredients','method'=>'get']) !!}
			{!! Form::text('ingredienti', null,['placeholder'=>'Inserisci l\'ingrediente']) !!}
			<div class="margin-top-10"> 
				{!! Form::submit('Cerca',['class'=>'btn btn-primary']) !!}  
			</div>
			{!! Form::close() !!}
		</div>
		
		<div class="col-sm-6 col-md-4">
			<h4>Ricerca per nome</h4>
			{!! Form::open(['route'=>'name','method'=>'get']) !!}
			{!! Form::text('name', null,['placeholder'=>'Inserisci il nome']) !!}
			<div class="margin-top-10"> 
				{!! Form::submit('Cerca',['class'=>'btn btn-primary']) !!}  
			</div>
			{!! Form::close() !!}
		</div>
		
	</div>
    
    <div class="margin-top-20"></div>
    <div class="row">
		@foreach ($recipes as $recipe) 
		  <div class="col-sm-6 col-md-4">
			<div class="thumbnail">
			  {!! Html::image('images/recipes-header.jpg') !!}
			  <div class="caption">
				<div  class="title">
					<a href="{{route('finder',['id'=>$recipe->id])}}"><h4>{{$recipe->title}}</h4></a>
				</div>
				
				<div class="action">
					<p>					

				@if(!Auth::guest())
					@if(Auth::user()->id == $recipe->user_id || Auth::user()->isAdmin == 1) 
						<a href="{{route('modify',['id'=>$recipe->id])}}" class="btn btn-primary" role="button">Modifica</a>
						<a href="{{route('deleteRecipe',['id'=>$recipe->id])}}" class="btn btn-danger" role="button">Elimina</a>
					@endif
				@endif

					</p>
				</div>
			  </div>
			</div>
		  </div>
		@endforeach
	</div>     

@endsection
