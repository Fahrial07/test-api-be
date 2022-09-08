<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataPelajaran extends Model
{
    use HasFactory, softDeletes;

    public $table = 'mata_pelajarans';

    protected $fillable = [
        'id_role',
        'id_jenis_mata_pelajaran',
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
