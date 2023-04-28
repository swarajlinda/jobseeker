<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserJobMap extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Store Job
    public function store(array $req)
    {
        UserJobMap::create($req);
    }

    /**
     * | Get All Applied Jobs
     */
    public function getAllAppliedJobs()
    {
        return DB::table('user_job_maps as ujm')
            ->select('ujm.*', 'u.name', 'u.email', 'j.job_title', 'j.location')
            ->where('status', 1)
            ->join('users as u', 'u.id', '=', 'ujm.user_id')
            ->join('jobs as j', 'j.id', '=', 'ujm.job_id')
            ->where('ujm.accept_reject', 0)
            ->orderByDesc('ujm.id')
            ->get();
    }


    public function getJobById($id)
    {
        return DB::table('user_job_maps as ujm')
            ->select('ujm.*', 'u.name', 'u.email', 'j.job_title', 'j.location', 'j.description')
            ->where('status', 1)
            ->join('users as u', 'u.id', '=', 'ujm.user_id')
            ->join('jobs as j', 'j.id', '=', 'ujm.job_id')
            ->where('ujm.id', $id)
            ->orderByDesc('ujm.id')
            ->first();
    }

    /**
     * | Update Job Status By ID
     */
    public function editUserJob(array $req): void
    {
        $job = UserJobMap::findOrFail($req['id']);
        $job->update([
            'message' => $req['message'],
            'accept_reject' => $req['applicationStatus']
        ]);
    }

    /**
     * | Get Jobs by User id
     */
    public function getJobByUserId($userId)
    {
        return DB::table('user_job_maps as ujm')
            ->select('ujm.*', 'u.name', 'u.email', 'j.job_title', 'j.location', 'j.description')
            ->where('status', 1)
            ->join('users as u', 'u.id', '=', 'ujm.user_id')
            ->join('jobs as j', 'j.id', '=', 'ujm.job_id')
            ->where('ujm.user_id', $userId)
            ->orderByDesc('ujm.id')
            ->get();
    }
}
