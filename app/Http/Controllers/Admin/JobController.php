<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * | Job View
     */
    public function addJobView()
    {
        $jobs = Job::orderByDesc('id')->get();
        return view('Admin.Jobs.addjob-view', ['jobs' => $jobs]);
    }

    // Store Job View
    public function storeJob(Request $req)
    {
        try {
            $mJob = new Job();
            $request = [
                'job_title' => $req->jobTitle,
                'location' => $req->location,
                'description' => $req->description,
            ];
            $mJob->store($request);
            return back()->with('success', 'Successfully Saved the Job');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Show Job
    public function showJob($id)
    {
        $job = Job::findOrFail($id);
        return view('Admin/Jobs/show-job', ['job' => $job]);
    }

    /**
     * | Update Job
     */
    public function updateJob(Request $req)
    {
        try {
            $mJob = new Job();
            $updReq = [
                'job_title' => $req->jobTitle,
                'location' => $req->location,
                'description' => $req->description,
            ];
            $mJob->edit($updReq, $req->id);
            return back()->with('success', "Successfully Updated The Job");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
