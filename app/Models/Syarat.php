<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syarat extends Model
{
    use HasFactory;
    protected $table='syaratdanketentuan';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
