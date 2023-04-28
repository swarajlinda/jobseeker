@extends('Admin.app')

@section('page-css')
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
                <i class="fa fa-user-tie"></i> Applied Candidate Details
            </button>

        </h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <a type="button" class="btn btn-warning" href="{{$job->resume}}" target="_blank">
            <i class=" fa fa-file"></i> See Resume
        </a>
        <form action="{{route('userjob.update')}}" method="POST">
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
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" placeholder="Update Message for the Candidate">
                    {{$job->message}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="applicationStatus">Application Status</label>
                    <select name="applicationStatus" id="applicationStatus" class="form-control" required>
                        <option value="">--- Select Application Status ---</option>
                        <option value="1" @if($job->accept_reject==1) selected @endif>Approve</option>
                        <option value="2" @if($job->accept_reject==2) selected @endif>Reject</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-file"></i> Update</button>
            </div>
        </form>
    </div>

</div>
@endsection

@section('page-script')

@endsection