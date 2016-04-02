@extends('layouts.app')

@section('content')
	<p>Hai cercato le ricette con <b>{{$input}}</b></p>
	
	@foreach ($recipes as $recipe)
		<a href="{{route('finder',['id'=>$recipe->id])}}"><h4>{{$recipe->title}}</h4></a>
	@endforeach 
		
	<p class="margin-top-20">
		<a href="{{route('ricette.lista')}}" class="btn btn-primary" role="button">Torna a lista ricette</a> 
	</p>

@endsection
