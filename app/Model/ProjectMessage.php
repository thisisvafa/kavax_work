<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProjectMessage extends Model
{
    protected $table = 'support_messages';
    protected $primaryKey = 'msg_id';
    protected $fillable = ['message', 'project_id', 'replied_by', 'user_id', 'files'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format("d M, Y");
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function replied()
    {
        return $this->belongsTo(\App\User::class, 'replied_by');
    }

    public function file()
    {
        return $this->hasOne(File::class, 'msg_id');
    }
}
