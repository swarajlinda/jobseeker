@extends('Admin.app')

@section('page-css')
<link rel="stylesheet" href="AdminDash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminDash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminDash/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('page-section')
<!-- Success Message -->
@if (\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<!-- Error Message -->
@if (\Session::has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addJobs">
                Applied Jobs List
            </button>
        </h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">JobTitle</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Location</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->name}}</td>
                                <td>{{$job->email}}</td>
                                <td>{{$job->job_title}}</td>
                                <td>{{$job->location}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="window.location.replace('admin/jobmap-by-id/{{$job->id}}')"><i class="fa fa-eye"></i> View</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('page-script')
<script src="AdminDash/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminDash/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="AdminDash/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="AdminDash/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="AdminDash/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="AdminDash/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="AdminDash/plugins/jszip/jszip.min.js"></script>
<script src="AdminDash/plugins/pdfmake/pdfmake.min.js"></script>
<script src="AdminDash/plugins/pdfmake/vfs_fonts.js"></script>
<script src="AdminDash/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="AdminDash/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="AdminDash/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection