@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>User Manager Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('usermanagers.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>User Id</b></label>
			<div class="col-sm-10">
				{{ $usermanager->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>User First Name</b></label>
			<div class="col-sm-10">
				{{ $usermanager->first_name }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>User Last Name</b></label>
			<div class="col-sm-10">
				{{ $usermanager->last_name }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>User Email</b></label>
			<div class="col-sm-10">
				{{ $usermanager->email }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>User Contact</b></label>
			<div class="col-sm-10">
				{{ $usermanager->contact }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>User Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $usermanager->profile_pic) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Address</b></label>
			<div class="col-sm-10">
				{{ $usermanager->address }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Password</b></label>
			<div class="col-sm-10">
				{{ $usermanager->password }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Status</b></label>
			<div class="col-sm-10">
				{{ $usermanager->Status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Verification</b></label>
			<div class="col-sm-10">
				{{ $usermanager->Verification }}
			</div>
		</div>
	</div>
</div>
@endsection
