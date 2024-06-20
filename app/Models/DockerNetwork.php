<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DockerNetwork extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
//        'docker_id',
        'name',
//        'description',
        'job'
    ];

//    public function dockers()
//    {
//        return $this->hasMany(Docker::class);
//    }

    public function dockers(): BelongsTo
    {
        return $this->BelongsTo(Docker::class);
    }

}
