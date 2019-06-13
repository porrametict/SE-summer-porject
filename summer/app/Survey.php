<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
  protected $fillable = ['name', 'u_id', 'status'];

  public function questions(){
      return $this -> hasMany('App\Questions', 's_id', 'id');
  }

}
