<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table='Setting';
    protected $primaryKey='id';
    public $incrementing=false;
    public $timestamps=true;
}
