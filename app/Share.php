<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
  protected $fillable = [
  	'Id_peminjam',
  	'Nama',
    'share_name',
    'share_price',
    'share_qty'
  ];
}