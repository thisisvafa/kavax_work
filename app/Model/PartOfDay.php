<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PartOfDay extends Model
{
    public  static $date = null;

    public function times()
    {
        return $this->hasMany(Time::class);
    }
}
