@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Resource's Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('resources.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Id</b></label>
			<div class="col-sm-10">
				{{ $resource->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Name</b></label>
			<div class="col-sm-10">
				{{ $resource->name }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Industries</b></label>
			<div class="col-sm-10">
				{{ $resource->industries }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Technologies</b></label>
			<div class="col-sm-10">
				{{ $resource->technologies }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Frameworks</b></label>
			<div class="col-sm-10">
				{{ $resource->frameworks }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Department</b></label>
			<div class="col-sm-10">
				{{ $resource->department }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Role</b></label>
			<div class="col-sm-10">
				{{ $resource->role }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Team</b></label>
			<div class="col-sm-10">
				{{ $resource->team }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Date of Joining</b></label>
			<div class="col-sm-10">
				{{ $resource->dateofjoin }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Date of Birth</b></label>
			<div class="col-sm-10">
				{{ $resource->dateofbirth }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Personal Information</b></label>
			<div class="col-sm-10">
				{{ $resource->personalinfo }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Resource Documents</b></label>
			<div class="col-sm-10">
                <a href="{{ asset('documents/' .  $resource->documents) }}">{{$resource->documents}}</a>
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Description</b></label>
			<div class="col-sm-10">
				{{ $resource->description }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Resource Status</b></label>
			<div class="col-sm-10">
				{{ $resource->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Technology Created Date</b></label>
			<div class="col-sm-10">
				{{ $resource->created_at }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Technology Updated Date</b></label>
			<div class="col-sm-10">
				{{ $resource->updated_at }}
			</div>
		</div>
	</div>
</div>
@endsection
