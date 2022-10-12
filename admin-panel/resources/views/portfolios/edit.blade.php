@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Portfolio</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('portfolios.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('portfolios.update',$portfolio->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Technology Name:</strong>
<select  id="technology" name="technology" class="form-control">
    <option value="">-- Select Technology --</option>
    @foreach ($edittech as $data)
    <option value="{{$data->technologyname}}" {{$portfolio->technology == $data->technologyname  ? 'selected' : ''}}>
        {{$data->technologyname}}
    </option>
    @endforeach
</select>@error('technology')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Framework Name:</strong>
<select  id="framework" name="framework" class="form-control">
    <option value="">-- Select Framework --</option>
    @foreach ($frames1 as $data)
    <option value="{{$data->frameworkname}}" {{$portfolio->framework == $data->frameworkname  ? 'selected' : ''}}>
        {{$data->frameworkname}}
    </option>
    @endforeach
</select>
@error('framework')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Project Name:</strong>
<input type="text" name="project_name" value="{{ $portfolio->project_name }}" class="form-control" placeholder="Project Name">
@error('project_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Project Duration:</strong>
<input type="text" name="project_duration" value="{{ $portfolio->project_duration }}" class="form-control" placeholder="Project Duration">
@error('project_duration')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Team Size:</strong>
<input type="text" name="team_size" value="{{ $portfolio->team_size }}" class="form-control" placeholder="Team Size">
@error('team_size')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<input type="text" name="description" value="{{ $portfolio->description }}" class="form-control" placeholder="Description">
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Project Links:</strong>
<input type="text" name="links" value="{{ $portfolio->links }}" class="form-control" placeholder="Project Links">
@error('links')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status:</strong>
<input type="checkbox" id="status" name="status" {{ $portfolio->status=='Active' ? 'checked':'' }} class="form-control" placeholder="Status">
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
    $(function() {
          $('#status').bootstrapToggle({
              on:'Active',
              off:'InActive'
          });
        })
  </script>
@endsection
