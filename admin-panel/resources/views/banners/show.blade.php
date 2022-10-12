@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Banners Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('banners.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Banner Id</b></label>
			<div class="col-sm-10">
				{{ $banner->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Banner Title</b></label>
			<div class="col-sm-10">
				{{ $banner->title }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Banner Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $banner->image) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Banner Description</b></label>
			<div class="col-sm-10">
				{{ $banner->description }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Status</b></label>
			<div class="col-sm-10">
				{{ $banner->status }}
			</div>
		</div>
	</div>
</div>
@endsection
