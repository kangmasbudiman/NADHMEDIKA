<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobdetail extends Model
{
    use HasFactory;
    protected $table='jobsdetail';
    protected $primaryKey='id';
    protected $fillable = [
        'idJobs',
        'deskripsi',
        'file',
        'status',
         ];

    public $timestamps=true;


}
