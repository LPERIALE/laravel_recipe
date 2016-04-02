@extends('layouts.app')

@section('content')

    
    {!! Form::open(['url'=>'lista','method'=>'post']) !!}
        <div class="form-group">
            <table>
                <tr>
                    <td>{!! Form::label('title', 'Titolo') !!}</td>
                    <td>{!! Form::text('title', null,['placeholder'=>'Inserisci il titolo']) !!}</td>
                </tr>
                
                <tr>
                    <td>{!! Form::label('description', 'Descrizione') !!}</td>
                    <td>{!! Form::textarea('description', null,['placeholder'=>'Inserisci la descrizione']) !!}</td>
                </tr>
                
                <tr>
                    <td>{!! Form::label('ingreds', 'Ingredienti') !!}</td>
                    <td>{!! Form::select('ingreds[]', $ingreds, null,['class'=>'form-control','multiple']) !!}</td>
                </tr>
                
                <tr>
                    <td>{!! Form::label('newIngreds', 'Aggiungi ingredienti') !!}</td>
                    <td>{!! Form::text('newIngreds', null) !!}</td>
                </tr>
            
            </table>
        </div>
    <div class="right">{!! Form::submit('Invia',['class'=>'btn btn-primary']) !!}   </div> 
    {!! Form::close() !!}


    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
        
    

@endsection
