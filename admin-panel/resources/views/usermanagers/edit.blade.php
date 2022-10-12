@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="content-header">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit User</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('usermanagers.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('usermanagers.update',$usermanager->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>First Name:</strong>
<input type="text" name="first_name" value="{{ $usermanager->first_name }}" class="form-control" placeholder="First name">
@error('first_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Last Name:</strong>
    <input type="text" name="last_name" value="{{ $usermanager->last_name }}" class="form-control" placeholder="Last name">
    @error('last_name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $usermanager->email }}">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Contact:</strong>
    <input type="text" name="contact" class="form-control" placeholder="Contact" value="{{ $usermanager->contact }}">
    @error('contact')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Profile Pic:</strong>
        <input type="file" name="profile_pic" class="form-control">
        <img src="{{ asset('images/' . $usermanager->profile_pic) }}" width="100" class="img-thumbnail" />
		<input type="hidden" name="hidden_profile_pic" value="{{ $usermanager->profile_pic }}" />
        @error('profile_pic')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Address:</strong>
<input type="text" name="address" value="{{ $usermanager->address }}" class="form-control" placeholder="Address">
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Password:</strong>
    <input type="text" name="password" value="{{ $usermanager->password }}" class="form-control" placeholder="Password">
    @error('password')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Status:</strong>
    <input type="checkbox" id="status" name="Status" {{ $usermanager->status=='Active' ? 'checked':'' }} class="form-control" placeholder="Status">
    @error('Status')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Verification:</strong>
<input type="text" name="Verification" value="{{ $usermanager->Verification }}" class="form-control" placeholder="Verification">
@error('Verification')
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
