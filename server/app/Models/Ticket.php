<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'event_tickets';

    public function getValidityAttribute()
    {
        return json_decode($this->special_validity);
    }

    public function getDescriptionAttribute()
    {
        if (!$this->validity)
            return null;

        if ($this->validity->type !== 'date')
            return $this->validity->amount . ' tickets available';

        return 'Available until ' . Carbon::parse($this->validity->date)->format('F j, Y');
    }
}
