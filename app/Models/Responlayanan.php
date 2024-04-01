<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responlayanan extends Model
{
    use HasFactory;
    protected $table='r_responlayanan';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
