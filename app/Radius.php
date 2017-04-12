<?php

namespace Mnemosine;

use Illuminate\Database\Eloquent\Model;

class Radius extends Model
{
    protected $connection = 'mysql_radius';
    protected $table = 'radcheck';
    protected $fillable = ['id', 'username', 'attribute', 'op', 'value'];

    public $timestamps = false;
}
