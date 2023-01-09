<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 't__s__tickets';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }


    public function messages()
    {
        return $this->hasMany(TicketMessage::class, 'tstID')->orderBy('created_at', 'asc');
    }

    public function addMessage($data)
    {
        return TicketMessage::create([
            'tstID' => $data['ticket_id'],
            'message' => $data['message'],
            'userID' => $data['user_id']
        ]);
    }

    public function addFile($data)
    {
        return TicketMessage::create([
            'tstID' => $data['ticket_id'],
            'stFiles' => 1,
            'userID' => $data['user_id']
        ]);
    }
}
