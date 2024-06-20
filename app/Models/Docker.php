<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docker extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'docker_network_id',
        'job'
    ];

//    public function network(): BelongsTo
//    {
//        return $this->belongsTo(DockerNetwork::class);
//    }

    public function network(): BelongsTo
    {
        return $this->belongsTo(DockerNetwork::class,'docker_network_id');
    }

    public function volumes()
    {
        return $this->hasMany(DockerVolume::class);
    }

    public function options()
    {
        return $this->hasMany(DockerOption::class);
    }
}
