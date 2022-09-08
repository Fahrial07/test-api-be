<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataUser extends Model
{
    use HasFactory, softDeletes;

    public $table = 'data_users';

    protected $fillable = [
        'id_users',
        'name',
        'deskripsi',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
