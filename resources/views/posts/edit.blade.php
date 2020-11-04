@extends('layouts.app')
@section('content')
<h3>edit form</h3>
@can('update', $post)
  {!! Form::model($post,['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostsController@update',$post->id]]) !!}
    <div class="form-group" dir="ltr">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Discrition:') !!}
        {!! Form::textarea('content',$post->title,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit ('update',['class'=>'btn btn-warning']) !!}
    </div>
    {!! Form::model($post,['method'=>'DELETE', 'action'=>['App\Http\Controllers\PostsController@destroy',$post->id]]) !!}
    <div class="form-group">
        {!! Form::submit ('Delete',['class'=>'btn btn-danger']) !!}
    </div>
{!! Form::close() !!}  
@endcan


{{-- <form method="post" action="/posts/{{$post->id}}">
        @csrf 
        <input type="hidden" name="_method" value="patch">
        <input type="text" name="title" placeholder="title" value="{{$post->title}}">
    </br>
        <textarea type="text" name="content" placeholder="dicription">{{$post->content}}</textarea>
</br>
        <button type="submit" name="submit">update</button>
    </form>


<form method="post" action="/posts/{{$post->id}}">
        @csrf 
        <input type="hidden" name="_method" value="delete">
</br>
        <button type="submit" name="submit">delete</button>
    </form> --}}
@endsection