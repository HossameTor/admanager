<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Banndate extends Model
{
    protected $fillable = [
        'position','date','banniere_id',
    ];
}
