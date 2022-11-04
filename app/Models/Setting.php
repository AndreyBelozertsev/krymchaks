<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    protected $primaryKey = 'key';
    protected $keyType = 'string';
    public $timestamps = false;

    public function insert_meta($key,$value){
        $meta = new Setting();
        $meta->key = $key;
        $meta->value = $value;
        $meta->save();

    }
}
