<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Singkatan extends Model
{
    use HasFactory, softDeletes;

    public $table = 'singkatans';

    protected $fillable = [
        'id_role',
        'name',
        'singkatan',
        'deskripsi',
        'status',
        'slug'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


}
