@extends('layouts.app')

@section('title', 'New Article')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Create an article</h3>

            @include('shared.errors')

            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="title" placeholder="click here to input the title" style="margin-bottom: 20px;">
                <input type="text" class="form-control" name="intro" placeholder="click here to input the introduction" style="margin-bottom: 20px;">

                <!-- edit -->
                <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#editTab" aria-controls="editTab" role="tab" data-toggle="tab">Edit</a></li>
                    <li role="presentation"><a href="#previewTab" aria-controls="previewTab" role="tab" data-toggle="tab" id="previewButton">Preview</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="editTab">
                        <textarea class="z-textarea" name="content" rows="20" style="width:100%;"></textarea>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="previewTab">
                        <div class="z-textarea-preview markdown">
                            Preview
                        </div>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>

        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
// csrf token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//Markdown AJAX ??
$('#previewButton').click(function (){
    //console.log($('.z-textarea').val())
    $('.z-textarea-preview').html('loading...');
    //AJAX ??
    $.ajax({
        url: "{{ route('markdown') }}",
        type: "post",
        data: {
            content:$('.z-textarea').val()
        },
        success: function(res){
            //console.log(res);
            $('.z-textarea-preview').html(res);
        },
        error: function(err){
            console.log(err.responseText);
        }
    });
})
</script>
@endsection