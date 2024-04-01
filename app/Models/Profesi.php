<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;
    protected $table='profesi';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
