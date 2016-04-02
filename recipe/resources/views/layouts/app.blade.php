<!DOCTYPE html>
<html>
    <head>
        <title>Le ricette di Laura</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">

    </head>
    
    <body class="bgHome">
        <div class="header">

            @section('navbar')
           
            <ul class="nav nav-tabs transparency">

			  <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('/home') }}">Home</a></li>
              <li class="{{ Request::is('lista') ? 'active' : '' }}"><a href="{{ url('/lista') }}">Elenco ricette</a></li>
			  <li class="{{ Request::is('crea') ? 'active' : '' }}"><a href="{{ url('/crea') }}">Inserisci nuova ricetta</a></li>


			 <div class="right margin-top-10 margin-right-60">
                    @if (Auth::guest())

							<li class="guest"><a href="{{ url('/login') }}">Login</a></li>
							<li class="guest"><a href="{{ url('/register') }}">Registrati</a></li>

                    @else
						<div class="btn-group user">
						  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							{{ Auth::user()->name }} <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
							<li><a href="{{ url('/logout') }}">Logout</a></li>
							<li><a href="{{ url('/user/ricette') }}">Le mie ricette</a></li>
							@if (Auth::user()->isAdmin)
								<li><a href="{{ url('/admin') }}">Admin home</a></li>
							@endif
						  </ul>
						</div>
                    @endif
                </div>
               </ul>
            
            
             <!-- Collapsed Hamburger -->
                
           
            @show

        </div>
        
        <div class='container'>
			<div class="row">
				<div class="col-md-8 col-sm-8 col-md-offset-2 transparency">
					<h1><strong><center>Le ricette di Laura</center></strong></h1>
					@yield('content')
					
					@show
				</div>
            </div>
        
			<div class="row">
				<div class="ol-md-8 col-sm-8 col-md-offset-2 transparency">
					<p><center>Copyright &copy; <a href="mailto:#">Laura Periale</a>. </center> </p> 
				</div> 
			</div>
		</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
