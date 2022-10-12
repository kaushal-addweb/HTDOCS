@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="row">
			<div class="col col-md-6"><b>
                <div class="pull-left">
                    <h2>Faqs Details</h2></b></div>
                </div>
			<div class="col col-md-6">
				<a href="{{ route('faqs.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>FAQ Id</b></label>
			<div class="col-sm-10">
				{{ $faq->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>FAQ Question</b></label>
			<div class="col-sm-10">
				{{ $faq->question }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>FAQ Answer</b></label>
			<div class="col-sm-10">
				{{ $faq->answer }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>FAQ Status</b></label>
			<div class="col-sm-10">
				{{ $faq->status }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>FAQ Created Date</b></label>
			<div class="col-sm-10">
				{{ $faq->created_at }}
			</div>
		</div>
	</div>
</div>
@endsection
