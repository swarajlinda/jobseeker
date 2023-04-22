<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User\UserJobMap;
use Illuminate\Http\Request;

class UserJobController extends Controller
{
    // User Job List View
    public function jobList()
    {
        $mJob = Job::orderByDesc('id')->get();
        return view('Users.job-list', ['jobs' => $mJob]);
    }

    // Apply Job
    public function applyJobView($id)
    {
        return view('Users.apply-job-view', [
            'jobId' => $id
        ]);
    }

    // Apply Job
    public function applyJob(Request $req)
    {
        $mUserJobMap = new UserJobMap();
        $metaReq = [
            'user_id' => auth()->user()->id,
            'job_id' => $req->jobId,
            'resume' => $req->resume,
        ];
        $mUserJobMap->store($metaReq);
        return back()->with('success', 'Successfully Applied for the Job');
    }
}
