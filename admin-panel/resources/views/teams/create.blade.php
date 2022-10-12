@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Team</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('teams.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Team Name:</strong>
<input type="text" name="teamname" class="form-control" placeholder="Team name">
@error('teamname')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<input type="text" name="description" class="form-control" placeholder="Description">
@error('description')
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
