<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, softDeletes;

    public $table = 'roles';

    protected $fillable = [
        'name',
        'deskripsi',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function User()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }

}
