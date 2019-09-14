@extends('_views.guest.layout', ['title'=>'Resources'])

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
</div>

<div class="container">
    <br />

    <h1>
        Deno Resources
    </h1>

    <p>Total list of {{ $resources->count() }} resources for Deno</p>

    <table class="table table-striped">
        <tr>
            <th>
                Title
            </th>
            <th width="100">
                Type
            </th>
            <th width="100">
                More
            </th>
        </tr>
        @foreach ($resources as $resource)
        <tr>
            <td>
                <a href="/resources/resource/{{ $resource->id }}">
                    {{ $resource->title }}
                </a>
            </td>
            <td>
                {{ $resource->type }}
            </td>
            <td>
                <a href="/resources/resource/{{ $resource->id }}">
                    view
                </a>
            </td>
        </tr>
        @endforeach
    </table>


    @if ($previous = $pagination->previous)
    <a href="{{ $page->baseUrl }}{{ $pagination->first }}">&lt;&lt;</a>
    <a href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
    @else
    &lt;&lt; &lt;
    @endif

    @foreach ($pagination->pages as $pageNumber => $path)
    <a href="{{ $page->baseUrl }}{{ $path }}" class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
        {{ $pageNumber }}
    </a>
    @endforeach

    @if ($next = $pagination->next)
    <a href="{{ $page->baseUrl }}{{ $next }}">&gt;</a>
    <a href="{{ $page->baseUrl }}{{ $pagination->last }}">&gt;&gt;</a>
    @else
    &gt; &gt;&gt;
    @endif
</div>
@endsection