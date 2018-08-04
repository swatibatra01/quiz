<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level_three extends Model
{
    protected $fillable=['name','level_one_id','level_two_id'];
    protected $table='level_three';
    public $timestamps = false;
}
