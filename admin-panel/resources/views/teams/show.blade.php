@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Team's Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('teams.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Team Id</b></label>
			<div class="col-sm-10">
				{{ $team->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Team Name</b></label>
			<div class="col-sm-10">
				{{ $team->teamname }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Team Description</b></label>
			<div class="col-sm-10">
				{{ $team->description }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Team Status</b></label>
			<div class="col-sm-10">
				{{ $team->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Team Created Date</b></label>
			<div class="col-sm-10">
				{{ $team->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
