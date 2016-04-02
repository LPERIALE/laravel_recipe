@extends('layouts.app')

@section('content')
    
     {!! Form::open(['url'=>'lista/'.$recipe->id,'method'=>'put']) !!}
        <div class="form-group">
            <table>
                <tr>
                    <td>{!! Form::label('title', 'Titolo') !!}</td>
                    <td>{!! Form::text('title', $recipe->title) !!}</td>
                </tr>
                
                <tr>
                    <td>{!! Form::label('description', 'Descrizione') !!}</td>
                    <td>{!! Form::textarea('description', $recipe->description) !!}</td>
                </tr>
                
                <tr>
                    <td>{!! Form::label('deleteIngreds', 'Elimina ingredienti') !!}</td>
                    <td>{!! Form::select('deleteIngreds[]', $ingreds, null,['class'=>'form-control','multiple']) !!}
                </tr>

				<tr>
                    <td>{!! Form::label('addIngreds', 'Aggiungi ingredienti') !!}</td>
                    <td>{!! Form::select('addIngreds[]', $allIngreds, null,['class'=>'form-control','multiple']) !!}</td>
                </tr>
                
                <tr>
					<td colspan="2">Se non trovi gli ingredienti, aggiungili qui</td>
                </tr>
                <tr>
                    <td>{!! Form::label('newIngreds', 'Nuovi ingredienti') !!}</td>
                    <td>{!! Form::text('newIngreds', null)!!}</td>
                </tr>
                
                <tr>
					<td>
						{!! Form::submit('Modifica',['class'=>'btn btn-primary']) !!}
					</td>
                </tr>
                
            </table>
        </div>
    {!! Form::close() !!}

	<p class="margin-top-20">
		<a href="{{route('ricette.lista')}}" class="btn btn-primary" role="button">Torna a lista ricette</a>
	</p>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
        
    

@endsection
