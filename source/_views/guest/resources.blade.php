@extends('_views.guest.layout',['title'=>'Resources'])

@section('body')
<h1>{{ $page->title }}</h1>

@yield('content')
@endsection