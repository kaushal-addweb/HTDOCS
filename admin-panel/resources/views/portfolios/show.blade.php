@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>PortFolio's Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('portfolios.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>PortFolio Id</b></label>
			<div class="col-sm-10">
				{{ $portfolio->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Technology Name</b></label>
			<div class="col-sm-10">
				{{ $portfolio->technology }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Framework Name</b></label>
			<div class="col-sm-10">
				{{ $portfolio->framework }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Project Name</b></label>
			<div class="col-sm-10">
				{{ $portfolio->project_name }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Project Duration</b></label>
			<div class="col-sm-10">
				{{ $portfolio->project_duration }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Team Size</b></label>
			<div class="col-sm-10">
				{{ $portfolio->team_size }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Project Description</b></label>
			<div class="col-sm-10">
				{{ $portfolio->description }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Project Links</b></label>
			<div class="col-sm-10">
				{{ $portfolio->links }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>PortFolio Status</b></label>
			<div class="col-sm-10">
				{{ $portfolio->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Technology Created Date</b></label>
			<div class="col-sm-10">
				{{ $portfolio->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
