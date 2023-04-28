<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User\UserJobMap;
use Exception;
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
        $fileName = time() . '.' . $req->resume->extension();

        $req->resume->move(public_path('uploads'), $fileName);

        $metaReq = [
            'user_id' => auth()->user()->id,
            'job_id' => $req->jobId,
            'resume' => 'uploads/' . $fileName,
        ];
        $mUserJobMap->store($metaReq);
        return back()->with('success', 'Successfully Applied for the Job');
    }

    // User Applied Jobs
    public function userAppliedJobs()
    {
        $mUserJobMap = new UserJobMap();
        $jobs = $mUserJobMap->getAllAppliedJobs();
        return view('Admin.Jobs.applied-jobs', [
            'jobs' => $jobs
        ]);
    }

    // Get Job Map by Id
    public function jobmapById($id)
    {
        $mUserJobMap = new UserJobMap();
        $job = $mUserJobMap->getJobById($id);
        return view('Admin.Jobs.jobmap-details', [
            'job' => $job
        ]);
        return $job;
    }


    /**
     * | Update Job Status
     */
    public function userJobUpdate(Request $req)
    {
        try {
            $mUserJobMap = new UserJobMap();
            $mUserJobMap->editUserJob($req->toArray());
            return back()->with('success', 'Successfully Updated The Job Request');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Applied Job List
    public function myAppliedJob()
    {
        $userId = auth()->user()->id;
        $mUserJobMap = new UserJobMap();
        $jobs = $mUserJobMap->getJobByUserId($userId);
        return view('Users.appliedjob-list', [
            'jobs' => $jobs
        ]);
    }

    // Applied Job Details
    public function appliedJobDetails($id)
    {
        $mUserJobMap = new UserJobMap();
        $job = $mUserJobMap->getJobById($id);
        return view('Users.appliedjob-details', [
            'job' => $job
        ]);
    }
}
