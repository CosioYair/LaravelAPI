<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{

  public function user()
  {
    return $this->belongsTo('App\User', 'created_by');
  }
}
