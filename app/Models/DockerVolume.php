<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DockerVolume extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'docker_id',
        'value1',
        'value2',
//        'description',
        'job'
    ];


}
