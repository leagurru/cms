@extends('layouts.app')
@section('content')

    <h1>Editar Posteo</h1>

    {!! Form::model($post,['method'=>'PATCH','action'=>['PostsController@update',$post->id]])  !!}

    {{csrf_field()}}


    {{-- actualizacion --}}
    <div class="form-group">

        {!! Form::label('title','Título:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        {!! Form::submit('Actualizar Posteo',['class'=>'btn btn-info']) !!}

    </div>
    {!! Form::close() !!}


    {{-- borrado--}}

    <div class="form-group">
        {!! Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id]])  !!}
        {!! Form::submit('Borrar Posteo',['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@endsection


