<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{

  protected $fillable = [
    'husband_name',
    'husband_email',
    'husband_phone',
    'wife_name',
    'wife_email',
    'wife_phone',
    'user_id'
  ];


  public function user()
  {
    return $this->belongsTo('App\User', 'created_by');
  }
}
