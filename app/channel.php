<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
