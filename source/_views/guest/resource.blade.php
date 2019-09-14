@extends('_views.guest.layout', ['title'=>'Resource'])

@section('body')

<div class="container">
    <br />

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/resources/">Deno Resources</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $page->title }}
            </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <h1>{{ $page->title }}</h1>
        </div>
        <div class="card-body">
            <p>
                <b>Resource Type:</b>
                <br />
                {{ $page->type }}
            </p>
            <p>
                <b>Sumary:</b>
                <br />
                {{ $page->description }}
            </p>
        </div>
        <div class="card-footer">
            Url:
            <a href="{{ $page->url }}" target="_blank">{{ $page->url }}</a>
        </div>
    </div>
</div>

@endsection