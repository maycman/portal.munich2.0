<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SEncuesta extends Model
{
    protected $fillable = ['acepta','reprograma','fecha_reprograma','p1','p2','p2a','p2b','p2c','p2d','p2e','p2f','p3','disp_refacciones','problema_no_determinado','falla_de_nuevo','trabajo_parcial','taller_causo_problema','taller_nego_problema','taller_ocupado','otro','p4','p4a','p4b','p4c','p4d','p5','p6','p6a','p7','comentarios'];
}
