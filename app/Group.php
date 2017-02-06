<?php

namespace Mnemosine;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'deleted'];
}
