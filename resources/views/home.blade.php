@extends('layouts.app')

@section('title', 'home')

@section('content')

<a class="btn btn-primary" style="margin-bottom:20px" href="{{ route('articles.create') }}">+ New Article</a>

@forelse($articles as $article)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h3>
  </div>
  <div class="panel-body">
    <p> {{ $article->created_at }}</p>
    <p>{{ $article->intro}}</p>
  </div>
</div>
@endforeach

@endsection