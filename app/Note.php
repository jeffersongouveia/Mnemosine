<?php

namespace Mnemosine;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['id_vault', 'icon', 'name', 'note', 'favorite', 'deleted'];
}
