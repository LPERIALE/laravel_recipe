@extends('layouts.app')

@section('content')
	<h3>{{$recipe->title}}</h3> 
	
	<h4 class="margin-top-30">Ingredienti:</h4>
	<ul>
		@foreach($recipe->ingreds as $ingred)
			<li>{{$ingred->name}}</li>	
		@endforeach
	</ul>
	
	<h4 class="margin-top-30">Procedimento:</h4>	
	<p>{!! nl2br(e($recipe->description)) !!}</p>
		
	<p class="margin-top-20">
		<a href="{{route('ricette.lista')}}" class="btn btn-primary" role="button">Torna a lista ricette</a> 
		
	@if(!Auth::guest())
		@if(Auth::user()->id == $recipe->user_id || Auth::user()->isAdmin == 1) 
			<a href="{{route('modify',['id'=>$recipe->id])}}" class="btn btn-default" role="button">Modifica</a>
		@endif
	@endif

	</p>

@endsection
