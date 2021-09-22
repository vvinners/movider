<?php

namespace VVinners\Movider;

use Illuminate\Database\Eloquent\Model;

class MoviderLog extends Model
{
    protected $table = 'movider_log';

    protected $fillable = [
        'to',
        'from',
        'content',
    ];

}
