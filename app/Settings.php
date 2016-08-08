<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public static function getParam($key, $default = null) {
		$param = Settings::whereName($key)->first();
		return $param ? $param->val : $default;
    }

    public static function setParam($key, $value) {
    	$param = Settings::whereName($key)->first();
    	if (!$param) {
    		$param = new Settings();
    		$param->name = $key;
    	}
    	$param->val = $value;
    	$param->save();
    }
}
