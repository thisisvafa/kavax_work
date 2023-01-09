<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'description',
        'category',
        'start_date',
        'end_date',
        'pause_at',
        'status',
        'progress',
        'priority',
        'assigned_to',
        'assigned_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'assigned_to');
    }

    public function status()
    {
        return $this->status == 1 ? 'Running' : ($this->status == 2 ? 'Pause' : 'Completed');
    }

    public function priority()
    {
        return $this->priority == 0 ? 'Low' : ($this->priority == 1 ? 'Medium' : 'High');
    }

    public function allData($id)
    {
        return $this->where('project_id', $id)->orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
    }

    public function create($data)
    {
        // $lastElement = end($data['category']);
        // $category = "[";
        // foreach ($data['category'] as $key => $value) {
        //     $category .= $value;
        //     $category .= $value == $lastElement ? "" : ",";
        // }
        // $category .= "]";
        //$data['category'] = $category;
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
}
