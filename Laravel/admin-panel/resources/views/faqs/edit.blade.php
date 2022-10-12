@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit FAQs</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('faqs.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('faqs.update',$faq->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Question:</strong>
<input type="text" name="question" value="{{ $faq->question }}" class="form-control" placeholder="Question">
@error('question')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Answer:</strong>
    <textarea name="answer" id="answer" class="form-control" placeholder="Answer" rows="10">{{ $faq->answer }}</textarea>
    @error('answer')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status:</strong>
<input type="checkbox" id="status" name="status" {{ $faq->status=='Active' ? 'checked':'' }} class="form-control" placeholder="Status">
@error('status')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</div>
@endsection
@section('footer-scripts')
<script>
    ClassicEditor
    .create( document.querySelector( '#answer' ) )
    .catch( error => {
    console.error( error );
    } );
    </script>
<script>
    $(function() {
          $('#status').bootstrapToggle({
              on:'Active',
              off:'InActive'
          });
        })
  </script>
@endsection
