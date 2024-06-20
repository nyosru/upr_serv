<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caddyfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
//        'caddyfile_id',
//        'password',
    ];

    public function domains()
    {
        return $this->hasMany(CaddyfileDomain::class);
    }

    public function options()
    {
        return $this->hasMany(CaddyfileOption::class);
    }
}
