@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>User DataTables</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('usermanagers.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Create User</a>
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
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact</th>
<th>Profile Pic</th>
<th>Address</th>
<th>Password</th>
<th>Status</th>
<th>Verification</th>
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
    ajax: "{{ url('usermanagers') }}",
    columns: [
    { data: 'id', name: 'id' },
    { data: 'first_name', name: 'first_name' },
    { data: 'last_name', name: 'last_name' },
    { data: 'email', name: 'email' },
    { data: 'contact', name: 'contact' },
    { data: 'profile_pic', name: 'profile_pic',
    "render": function (data, type, full, meta) {
        return "<img src=\"/images/" + data + "\" height=\"80px\"/>"} },
    { data: 'address', name: 'address' },
    { data: 'password', name: 'password' },
    { data: 'Status', name: 'Status' },
    { data: 'Verification', name: 'Verification' },
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
    url: "{{ url('delete-usermanager') }}",
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
