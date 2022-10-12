@extends('layouts.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">

                <div class="pull-left">
                    <b><center><h2>{{ $page->title }}</h2></center></b></div>
	</div>
	<div class="card-body">
        <div class="row mb-4">
			<div class="col-sm-10">
				<b>Page Slug:</b> {{ $page->slug }}
			</div>
		</div>
        <div class="row mb-4">
			<div class="col-sm-10">
				<b>Page Status: </b>{{ $page->status }}
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-sm-10">
				{!! $page->body !!}
			</div>
		</div>


	</div>
</div>
@endsection
