<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
	protected $primaryKey = 'id_rel';

	protected $table = 'rel_encuesta_pregunta';

    protected $fillable = ['id_encuesta','id_pregunta','respuesta'];

    public function pregunta()
    {
    	return $this->belongsTo('App\Pregunta','id_pregunta');
    }
    public function encuesta()
    {
    	return $this->belongsTo('App\Encuesta','id_encuesta');
    }
    public static function saveRespuesta($arrInfo)
    {
    	$cat = isset($arrInfo['id']) ? self::find($arrInfo['id']) : new self();
        $cat->fill($arrInfo);
        $cat->save();
        return $cat;
    }
}