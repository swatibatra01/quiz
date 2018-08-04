<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz_data extends Model
{
    protected $fillable=['title','options','level_one_id','level_two_id','level_three_id'];
}
