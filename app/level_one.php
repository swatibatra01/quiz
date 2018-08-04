<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level_one extends Model
{
    protected $fillable=['name'];
    protected $table='level_one';
    public $timestamps = false;
}
