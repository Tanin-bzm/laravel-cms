@extends('layouts.app')
@section('content')
    <h1>{{__('message.welcome',['name'=>'tanin'])}}</h1>
    {{-- <h1>@lang('message.welcom')</h1> --}}
    {{-- <h1>{{trans('message.welcom')}}</h1> --}}
@endsection