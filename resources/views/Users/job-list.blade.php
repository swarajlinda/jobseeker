@extends('Users.app')

@section('page-css')
<link rel="stylesheet" href="AdminDash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminDash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminDash/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('page-content')
<div class="container-fluid">
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Job Title</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Location</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Description</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">{{$job->job_title}}</td>
                            <td>{{$job->location}}</td>
                            <td>{{$job->description}}</td>
                            <td><button type="button" class="btn btn-primary btn-sm" onclick="window.location.replace('user/apply-job/{{$job->id}}')"><i class="fa fa-edit"></i> Apply Job</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection