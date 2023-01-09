<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MailSetting extends Model
{
    protected $table = 'mail_settings';
    protected $fillable = ['id', 'mail_to'];
    public $timestamps = false;

    public function assignMail($mail)
    {
        if ($this::first()) {
            return $this::first()->update(['mail_to' => $mail]);
        } else {
            return $this->create(['id' => 1, 'mail_to' => $mail]);
        }
    }
}
