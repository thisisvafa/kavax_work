<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectPayment extends Model
{
    protected $fillable = ['project_id', 'invoice_id', 'amount', 'description'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function invoice()
    {
        return $this->belongsTo(ProjectInvoice::class, 'invoice_id');
    }
}
