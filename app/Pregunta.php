<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $primaryKey = 'id_pregunta';

    protected $fillable = ['pregunta', 'origen'];

    public function Encuestas()
    {
        return $this->belongsToMany('App\Encuesta');
    }

    public static function savePregunta($arrInfo)
    {
        $question = isset($arrInfo['id_pregunta']) ? self::find($arrInfo['id_pregunta']) : new self();
        $question->fill($arrInfo);
        $question->save();
        return $question;
    }
}