<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table='transaksi_pendaftaran';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;


}
