@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Industries Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('industries.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Industry Id</b></label>
			<div class="col-sm-10">
				{{ $industry->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Industry Name</b></label>
			<div class="col-sm-10">
				{{ $industry->industryname }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Industry Status</b></label>
			<div class="col-sm-10">
				{{ $industry->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Industry Created Date</b></label>
			<div class="col-sm-10">
				{{ $industry->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
