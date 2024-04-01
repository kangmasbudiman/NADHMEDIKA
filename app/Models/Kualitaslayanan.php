<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kualitaslayanan extends Model
{
    use HasFactory;
    protected $table='r_kualitaslayanan';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
