<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
  protected $fillable = [
  	'nim',
  	'nama',
    'id_sepeda',
    'jenis_sepeda',
    'status'
  ];
  protected $table ="shares";
}