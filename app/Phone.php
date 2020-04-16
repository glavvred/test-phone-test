<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed name
 */
class Phone extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'phone'];

    protected $hidden = ['created_at', 'updated_at'];
}
