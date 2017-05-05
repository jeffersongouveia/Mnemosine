<?php

namespace Mnemosine;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = ['id_vault', 'icon', 'name', 'username', 'password', 'strength', 'ip', 'dns', 'equipment', 'favorite', 'deleted'];
}
