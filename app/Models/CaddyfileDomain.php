<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaddyfileDomain extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'domain',
        'caddyfile_id',
//        'password',
    ];
}
