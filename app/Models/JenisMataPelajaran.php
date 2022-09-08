<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisMataPelajaran extends Model
{

    use HasFactory, softDeletes;

    public $table = 'jenis_mata_pelajarans';

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
}
