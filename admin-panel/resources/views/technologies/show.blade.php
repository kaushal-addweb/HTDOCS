@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Technology's Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('technologies.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Technology Id</b></label>
			<div class="col-sm-10">
				{{ $technology->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Technology Name</b></label>
			<div class="col-sm-10">
				{{ $technology->technologyname }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Technology Status</b></label>
			<div class="col-sm-10">
				{{ $technology->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Technology Created Date</b></label>
			<div class="col-sm-10">
				{{ $technology->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
