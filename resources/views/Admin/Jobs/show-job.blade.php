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
                <i class="fa fa-plus-circle"></i> Update Jobs
            </button>
        </h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <form action="{{route('update.job')}}" method="POST">
            @csrf
            <div class="card-body">
                <input type="hidden" name="id" id="id" value="{{$job->id}}">
                <div class="form-group">
                    <label for="jobTitle">Job Title</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter Job Title" required value="{{$job->job_title}}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required value="{{$job->location}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" placeholder="Job Description" name="description" required>
                    {{$job->description}}
                    </textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-file"></i> Update</button>
            </div>
        </form>
    </div>
    @endsection