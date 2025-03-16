<?php

namespace app\models;

use app\models\core\BaseModel;

class Stat extends BaseModel
{
    protected static $table_name = 'stats';

    protected static $public_fields = ['key', 'value'];
    protected static $private_fields = ['id'];

    public $key;
    public $value;

    public static function get_value_by_key($key)
    {
        $record = static::where('key', '=', $key)->get()->first();
        return $record ? $record->value : null;
    }

    public static function increase_by_key($key, $step=1) {
        $stat = static::where('key', '=', $key)->get()->first();
        if ($stat) {
            $stat->value += $step;
            $stat->save();
        } else {
            static::create([
                'key' => $key,
                'value' => $step
            ]);
        }
    }
}
