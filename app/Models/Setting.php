<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    public static function getSetting($settingName)
    {
        $setting = self::select($settingName)->first();

        if ($setting) {
            return $setting->{$settingName};
        } else {
            return null;
        }
    }

}
