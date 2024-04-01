<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriblog extends Model
{
    use HasFactory;
    protected $table='kategori_blog';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
