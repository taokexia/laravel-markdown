@extends('layouts.app')

@section('title', $article->title)

@section('content')

<div class="z-panel">
    <div class="z-panel-header">
        <h3>{{ $article->title }}</h3>
        <span> {{ $article->created_at }}</span>
    </div>
    <div class="z-panel-body" style="padding:20px;">
        <div class="markdown">
            {!! $article->content !!}
        </div>
    </div>
</div>

@endsection