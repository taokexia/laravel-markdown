@extends('layouts.app')

@section('title', 'New Article')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Create an article</h3>

            @include('shared.errors')

            {{--new article--}}
            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="title" placeholder="click here to input the title" style="margin-bottom: 20px;">
                <input type="text" class="form-control" name="intro" placeholder="click here to input the introduction" style="margin-bottom: 20px;">
                <textarea class="z-textarea" name="content" rows="20" style="width:100%;" placeholder="please input with markdown"
></textarea>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>

        </div>
    </div>
</div>

@endsection