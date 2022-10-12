@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Contact Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('contacts.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Contact Id</b></label>
			<div class="col-sm-10">
				{{ $contact->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Contact Title</b></label>
			<div class="col-sm-10">
				{{ $contact->name }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Contact Email</b></label>
			<div class="col-sm-10">
				{{ $contact->email }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Contact No.</b></label>
			<div class="col-sm-10">
				{{ $contact->contactinfo }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Description</b></label>
			<div class="col-sm-10">
				{{ $contact->description }}
			</div>
		</div>
	</div>
</div>
@endsection
