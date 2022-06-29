<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $hidden = [
        'password',
    ];


    public function fmessages()
    {
        return $this->hasMany(FMessage::class);
    }
}
