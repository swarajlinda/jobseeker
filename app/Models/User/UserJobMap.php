<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobMap extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Store Job
    public function store(array $req)
    {
        UserJobMap::create($req);
    }
}
