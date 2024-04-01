<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriperawatan extends Model
{
    use HasFactory;
    protected $table='kategori_perawatan';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
