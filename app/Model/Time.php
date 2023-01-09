<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public static $date = null;

    protected $appends = ['isAvailable'];

    public function getIsAvailableAttribute()
    {

        $isAvailable = Appointment::where('time_id', $this->id)->where('date', $this::$date)->first();
        return ($isAvailable) ? false : true;
    }

    public function partOfDay()
    {
        return $this->belongsTo(PartOfDay::class);
    }

    public function part()
    {
        return $this->belongsTo(PartOfDay::class, 'part_of_day_id');
    }
}
