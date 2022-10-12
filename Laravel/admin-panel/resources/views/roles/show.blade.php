@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Role's Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Role Id</b></label>
			<div class="col-sm-10">
				{{ $role->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Role Name</b></label>
			<div class="col-sm-10">
				{{ $role->rolename }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Role Description</b></label>
			<div class="col-sm-10">
				{{ $role->description }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Role Status</b></label>
			<div class="col-sm-10">
				{{ $role->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Role Created Date</b></label>
			<div class="col-sm-10">
				{{ $role->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
