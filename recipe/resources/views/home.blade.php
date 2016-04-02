@extends('layouts.app')

@section('content')

	@if (Auth::guest())
		<h4>Benvenuti nel mio sito!</h4>
		<p>Se non sei loggato, puoi comunque navigare nei contenuti del sito con i link in alto.</p>
		<p>Se sei un utente registrato, <a href="{{ url('/login') }}">clicca qui per fare il login.</a></p>
		<p>Se ti vuoi registrare, <a href="{{ url('/register') }}">clicca qui.</a></p>
    
    @else
        
        <p>Questo sito nasce nel 2016 per il mio GRANDISSIMO interesse verso la cucina.<br />
        Le ricette NON SONO ASSOLUTAMENTE copiate da GialloZafferano!</p>
        
        Prosegui con la navigazione con i link in alto :D        
   
    @endif
    
@endsection
