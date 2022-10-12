@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Resource</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('resources.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('resources.update',$resource->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" value="{{ $resource->name }}" class="form-control" placeholder="Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Industries Name:</strong>
<select  id="industries" name="industries" class="form-control">
    <option value="">-- Select Industry --</option>
    @foreach ($indus as $data)
    <option value="{{$data->industryname}}" {{$resource->industries == $data->industryname  ? 'selected' : ''}}>
        {{$data->industryname}}
    </option>
    @endforeach
</select>
@error('industries')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Technologies Name:</strong>
<select  id="technologies" name="technologies" class="form-control">
    <option value="">-- Select Technology --</option>
    @foreach ($techno as $data)
    <option value="{{$data->technologyname}}" {{$resource->technologies == $data->technologyname  ? 'selected' : ''}}>
        {{$data->technologyname}}
    </option>
    @endforeach
</select>
@error('technologies')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Frameworks Name:</strong>
<select  id="frameworks" name="frameworks" class="form-control">
    <option value="">-- Select Framework --</option>
    @foreach ($frames as $data)
    <option value="{{$data->frameworkname}}" {{$resource->frameworks == $data->frameworkname  ? 'selected' : ''}}>
        {{$data->frameworkname}}
    </option>
    @endforeach
</select>
@error('frameworks')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Department Name:</strong>
<select  id="department" name="department" class="form-control">
    <option value="">-- Select Department --</option>
    @foreach ($depart as $data)
    <option value="{{$data->departmentname}}" {{$resource->department == $data->departmentname  ? 'selected' : ''}}>
        {{$data->departmentname}}
    </option>
    @endforeach
</select>
@error('department')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Role Name:</strong>
<select  id="role" name="role" class="form-control">
    <option value="">-- Select Role --</option>
    @foreach ($rol as $data)
    <option value="{{$data->rolename}}" {{$resource->role == $data->rolename  ? 'selected' : ''}}>
        {{$data->rolename}}
    </option>
    @endforeach
</select>
@error('role')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Team Name:</strong>
<select  id="team" name="team" class="form-control">
    <option value="">-- Select Team --</option>
    @foreach ($tem as $data)
    <option value="{{$data->teamname}}" {{$resource->team == $data->teamname  ? 'selected' : ''}}>
        {{$data->teamname}}
    </option>
    @endforeach
</select>
@error('team')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Date of Joining:</strong>
<input type="date" name="dateofjoin" value="{{ $resource->dateofjoin }}" class="form-control" placeholder="Date of Joining">
@error('dateofjoin')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Date of Birth:</strong>
<input type="date" name="dateofbirth" value="{{ $resource->dateofbirth }}" class="form-control" placeholder="Date of Birth">
@error('dateofbirth')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Personal Information:</strong>
<input type="text" name="personalinfo" value="{{ $resource->personalinfo }}" class="form-control" placeholder="Personal Information">
@error('personalinfo')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Documents Upload:</strong>
<input type="file" name="documents" class="form-control">
<a href="{{ asset('documents/' . $resource->documents) }}">{{$resource->documents}}</a>
<input type="hidden" name="hidden_documents" value="{{ $resource->documents }}" />
@error('documents')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<input type="text" name="description" value="{{ $resource->description }}" class="form-control" placeholder="Description">
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status:</strong>
<input type="checkbox" id="status" name="status" {{ $resource->status=='Active' ? 'checked':'' }} class="form-control" placeholder="Status">
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
