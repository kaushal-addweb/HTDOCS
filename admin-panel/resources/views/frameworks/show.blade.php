@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Frameworks Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('frameworks.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Framework Id</b></label>
			<div class="col-sm-10">
				{{ $framework->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Framework Name</b></label>
			<div class="col-sm-10">
				{{ $framework->frameworkname }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Framework Status</b></label>
			<div class="col-sm-10">
				{{ $framework->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Framework Created Date</b></label>
			<div class="col-sm-10">
				{{ $framework->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
