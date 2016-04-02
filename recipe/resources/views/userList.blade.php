@extends('layouts.app')

@section('content')
	
	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
    @endif  
	
	<h4 class="margin-top-20">Ciao {{Auth::user()->name}}, queste sono le tue ricette: </h4>
	
	<div class="row">
		
		<div class="col-sm-6 col-md-4">
			<h4>Visualizza ricette</h4>
			{!! Form::open(['route'=>'title','method'=>'get']) !!}
			{!! Form::select('id',$titles, null) !!}
			<div class="margin-top-15"> 
				{!! Form::submit('Visualizza',['class'=>'btn btn-primary']) !!}  
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


					@if(Auth::user()->id == $recipe->user_id || Auth::user()->isAdmin == 1) 
						<a href="{{route('modify',['id'=>$recipe->id])}}" class="btn btn-primary" role="button">Modifica</a>
						<a href="{{route('deleteRecipe',['id'=>$recipe->id])}}" class="btn btn-danger" role="button">Elimina</a>
					@endif

					</p>
				</div>
				
				
			  </div>
			</div>
		  </div>
		@endforeach
	</div>     

@endsection
