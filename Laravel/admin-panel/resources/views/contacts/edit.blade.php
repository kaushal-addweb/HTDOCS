@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Contact</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('contacts.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('contacts.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Email:</strong>
    <input type="email" name="email" value="{{ $contact->email }}" class="form-control" placeholder="Email">
    @error('email')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>


<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Contact No:</strong>
    <input type="text" name="contactinfo" value="{{ $contact->contactinfo }}" class="form-control" placeholder="Contact No">
    @error('contactinfo')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<textarea name="description" id="description" class="form-control" placeholder="Description" rows="10">{{ $contact->description }}</textarea>
@error('description')
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
    .create( document.querySelector( '#description' ) )
    .catch( error => {
    console.error( error );
    } );
    </script>
@endsection
