<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Cookie extends Model
{
    use Notifiable;
    
    protected $table = 'cookies';

    protected $fillable = [
        'name',
        'description',
        'email'
    ];
}
