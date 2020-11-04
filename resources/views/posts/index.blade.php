@extends('layouts.app')
@section('content')
<ul dir="rtl">
    @foreach ($posts as $post)
    <div class="image-container">
        <img class="img-responsive" height="70" src="/images/{{$post->path}}">
    </div>
     <li><a href="{{route ('posts.show', $post->id)}}">{{$post->title}}</a>
    <span>{{$post->user->name}}</span>
    </li>   
    @endforeach
</ul>
@endsection 
