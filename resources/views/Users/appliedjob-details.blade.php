@extends('Users.app')

@section('page-css')
@endsection

@section('page-content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <a type="button" class="btn btn-warning" href="Dashboard - HRMS.pdf" target="_blank">
                <i class=" fa fa-file"></i> See Resume
            </a>
            <div class="card-body">
                <input type="hidden" name="id" id="id" value="2">
                <div class="form-group">
                    <label for="jobTitle">Job Title</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter Job Title" required="" value="{{$job->job_title}}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required="" value="{{$job->location}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" placeholder="Job Description" name="description" required="">
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
                    <select name="applicationStatus" id="applicationStatus" class="form-control" required="" disabled>
                        <option value="">--- Application Pending ---</option>
                        <option value="1" @if($job->accept_reject==1) selected @endif>Approve</option>
                        <option value="2" @if($job->accept_reject==2) selected @endif>Reject</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')

@endsection