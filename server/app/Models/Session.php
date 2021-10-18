<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $dates = ['start', 'end'];

    public function getStartTimeAttribute()
    {
        return date('Y-m-d\TH:i', strtotime($this->start));
    }

    public function getEndTimeAttribute()
    {
        return date('Y-m-d\TH:i', strtotime($this->end));
    }

    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }
}
