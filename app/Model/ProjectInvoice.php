<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectInvoice extends Model
{
    protected $fillable = [
        'project_id', 'invoice_number',  'invoice_name', 'description', 'status'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function allData($id)
    {
        return $this->where('project_id', $id)->orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
    }

    public function create($data)
    {
        $this->fill($data);
        $this->save();
        return $this;
    }

    public function edit($id, $data)
    {
        $cat = $this->find($id);
        $cat->fill($data);
        return $cat->save();
    }

    public function view($id)
    {
        return $this->find($id);
    }

    public function deleteTask($id)
    {
        $cat = $this->findOrFail($id);
        return $cat->delete();
    }

    public function file()
    {
        return $this->hasOne(File::class, 'payment_id');
    }

    public function payments()
    {
        return $this->hasMany(ProjectPayment::class, 'invoice_id');
    }

    public function totalAmount()
    {
        return $this->payments()->sum('amount');
    }

    public function addPayment($data)
    {
        return ProjectPayment::create([
            'project_id' => $data['project_id'],
            'invoice_id' => $data['invoice_id'],
            'description' => $data['description'],
            'amount' => $data['amount'],
        ]);
    }

    public function changeStatus($id, $data)
    {
        return $this->find($id)->update($data);
    }
}
