<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WouchUser extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = ['password'];
}
