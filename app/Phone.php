<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['name', 'phone'];

    protected $hidden = ['created_at', 'updated_at'];
}
