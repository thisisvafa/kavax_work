<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'msgID';
    protected $fillable = ['tstID', 'userID', 'message', 'stFiles'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'userID');
    }

    public function file()
    {
        return $this->hasOne(File::class, 'tst_msg_id');
    }
}
