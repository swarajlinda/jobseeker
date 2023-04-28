@extends('Users.app')


@section('page-content')
<br>
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
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Upload Resume</div>
        </div>
        <div class="card-body">
            <form action="{{route('users.applyjob')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jobId" id="jobId" value="{{$jobId}}">
                <label for="resume">Resume</label>
                <input type="file" id="resume" class="resume" name="resume" required>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection