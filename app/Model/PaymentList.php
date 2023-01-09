<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentList extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'projectID');
    }
}
