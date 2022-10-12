@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Framework</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('frameworks.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('frameworks.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Framework Name:</strong>
<input type="text" name="frameworkname" class="form-control" placeholder="Framework name">
@error('frameworkname')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status:</strong>
<input type="checkbox" id="status" name="status" class="form-control" placeholder="Status">
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
</div>
@endsection
@section('footer-scripts')
<script>
    $(function() {
        $('#status').bootstrapToggle({
              on:'Active',
              off:'InActive'
          });
    })
  </script>
@endsection
