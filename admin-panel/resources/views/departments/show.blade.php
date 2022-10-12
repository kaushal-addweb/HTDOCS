@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Department's Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('departments.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Department Id</b></label>
			<div class="col-sm-10">
				{{ $department->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Department Name</b></label>
			<div class="col-sm-10">
				{{ $department->departmentname }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Department Description</b></label>
			<div class="col-sm-10">
				{{ $department->description }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Department Status</b></label>
			<div class="col-sm-10">
				{{ $department->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Department Created Date</b></label>
			<div class="col-sm-10">
				{{ $department->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
