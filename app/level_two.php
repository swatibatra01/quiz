<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level_two extends Model
{
    protected $fillable=['name','level_one_id'];
    protected $table='level_two';
    public $timestamps = false;
}
