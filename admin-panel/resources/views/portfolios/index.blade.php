@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Portfolio's DataTable</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{asset('./portfolios/create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Create Portfolios</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="datatable-crud">
<thead>
<tr>
<th>Id</th>
<th>Technology Name</th>
<th>Framework Name</th>
<th>Project Name</th>
<th>Project Duration</th>
<th>Team Size</th>
<th>Description</th>
<th>Project Links</th>
<th>Status</th>
<th>Created at</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
</div>

@endsection
@section('footer-scripts')

<script type="text/javascript">
    $(document).ready( function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#datatable-crud').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('portfolios') }}",
    columns: [
    { data: 'id', name: 'id' },
    { data: 'technology', name: 'technology' },
    { data: 'framework', name: 'framework' },
    { data: 'project_name', name: 'project_name' },
    { data: 'project_duration', name: 'project_duration' },
    { data: 'team_size', name: 'team_size' },
    { data: 'description', name: 'description' },
    { data: 'links', name: 'links' },
    { data: 'status', name: 'status' },
    { data: 'created_at', name: 'created_at' },
    {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
    });
    $('body').on('click', '.delete', function () {
    if (confirm("Delete Record?") == true) {
    var id = $(this).data('id');
    // ajax
    $.ajax({
    type:"POST",
    url: "{{ url('delete-portfolio') }}",
    data: { id: id},
    dataType: 'json',
    success: function(res){
    var oTable = $('#datatable-crud').dataTable();
    oTable.fnDraw(false);
    }
    });
    }
    });
    });
    </script>
@endsection
