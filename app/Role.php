<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
	{
    	return $this
        	->belongsToMany('App\User')
        	->withTimestamps();
	}
	public static function saveRole($arrInfo)
    {
        $role = isset($arrInfo['id']) ? self::find($arrInfo['id']) : new self();
        #Este es el chingon
        $role->fill($arrInfo);
        $role->save();
        return $role;
    }
}
