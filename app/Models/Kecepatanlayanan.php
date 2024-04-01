<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecepatanlayanan extends Model
{
    use HasFactory;
    protected $table='r_kecepatanlayanan';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
