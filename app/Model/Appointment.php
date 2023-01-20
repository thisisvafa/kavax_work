<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Appointment extends Model
{

    public function getDateAttribute($date)
    {
        if ($date == null) {
            return Carbon::parse($date)->format("d M, Y");
        } else {
            return 'Date not set!';
        }
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
