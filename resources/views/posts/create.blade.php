@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        {{$error}}<br>
    @endforeach
</div>
@endif
{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PostsController@store', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Discrition:') !!}
        {!! Form::textarea('content',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('file', 'uploadfile:') !!}
        {!! Form::file('file',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit ('save',['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
{{-- @if(session()->has('post_created'))<h3>{{session('post_created')}}</h3>@endif --}}
{{-- <form method="post" action="{{route('posts.store')}}">
        @csrf 
        <input type="text" name="title" placeholder="title">
        {{-- @if($errors->has('title'))<span>{{$errors->first('title')}}</span>@endif --}}
    {{-- </br>
        <textarea type="text" name="content" placeholder="dicription"></textarea>
        {{-- @if($errors->has('content'))<span>{{$errors->first('content')}}</span>@endif --}}
{{-- </br>
        <button type="submit" name="submit">save</button>
    </form>  --}}
@endsection