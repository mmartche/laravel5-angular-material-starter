<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class basePerChannel extends Model
{
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
