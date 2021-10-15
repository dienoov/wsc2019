<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organizer extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $guarded = [];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
