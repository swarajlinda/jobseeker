@extends('Users.app')


@section('page-content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Upload Resume</div>
        </div>
        <div class="card-body">
            <form action="{{route('users.applyjob')}}" method="post">
                @csrf
                <input type="hidden" name="jobId" id="jobId" value="{{$jobId}}">
                <label for="resume">Resume</label>
                <input type="file" id="resume" class="resume" name="resume">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection