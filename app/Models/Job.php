<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function store(array $req)
    {
        Job::create($req);
    }

    // Edit
    public function edit(array $req, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($req);
    }
}
