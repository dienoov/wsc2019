<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function registrations()
    {
        return $this->hasManyThrough(Registration::class, Ticket::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
}
