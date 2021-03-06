<?php

namespace Mnemosine;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $connection = 'pgsql_radius';
    protected $table = 'nas';
    protected $fillable = ['nasname', 'shortname', 'type', 'ports', 'secret', 'description'];

    public $timestamps = false;
}
