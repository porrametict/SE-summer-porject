<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repeats extends Model
{
    protected $fillable = ['age', 'sex', 'career', 's_id', 'province', 'q_id', 'rate'];
}
