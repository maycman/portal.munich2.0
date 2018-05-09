<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Completadas extends Model
{
    protected $fillable = ['id_registro','id_s_encuestas','estado'];
}
