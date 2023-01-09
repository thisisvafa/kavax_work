<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'objective',
        'budget',
        'start_date',
        'end_date',
        'pause_at',
        'status',
        'progress',
        'employee_size',
        'created_by',
        'package_name'
    ];

    protected $appends = ['category'];

    public function getCategoryAttribute()
    {
        return $this->categories();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function categories()
    {
        return $this->hasMany(ProjectCategory::class);
    }

    public function tasks()
    {
        return $this->hasMany(ProjectTask::class);
    }

    public function allData($request)
    {
        $projects = $this->query();
        if ($request->search != '') {
            $projects = $projects->where('name', "LIKE", "%" . $request->search . "%");
        }

        if ($request->user != '') {
            $projects = $projects->where('created_by', $request->user)
                ->orWhereHas('tasks', function ($query) use ($request) {
                    $query->where('assigned_to', $request->user);
                });
        }

        if (Auth::user()->role == 'super_admin') {
            return $projects->orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
        }
        return $projects->whereHas('tasks', function ($query) {
            $query->where('assigned_to', Auth::user()->id);
        })->orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
    }

    public function create($data)
    {
        $this->fill($data['project']);
        if ($new = $this->save()) {
            foreach ($data['categories'] as $cat) {
                ProjectCategory::create([
                    'project_id' => $this->id,
                    'category_id' => $cat
                ]);
            }
            return $new;
        }
        return false;
    }

    public function edit($id, $data)
    {
        $cat = $this->find($id);
        $this->fill($data['project']);
        if ($new = $this->save()) {
            $this->categories()->delete();
            foreach ($data['categories'] as $cat) {
                ProjectCategory::create([
                    'project_id' => $this->id,
                    'category_id' => $cat
                ]);
            }
            return $new;
        }
        
        return false;
    }

    public function view($id)
    {
        return $this->find($id);
    }

    public function deleteProject($id)
    {
        $cat = $this->findOrFail($id);
        return $cat->delete();
    }

    public function messages()
    {
        return $this->hasMany(ProjectMessage::class)->orderBy('msg_id', 'asc');
    }

    public function addMessage($data)
    {
        $data = ProjectMessage::create([
            'project_id' => $data['project_id'],
            'message' => $data['message'],
            'replied_by' => $data['user_id']
        ]);

        return $data;
    }

    public function addFile($data)
    {
        return ProjectMessage::create([
            'project_id' => $data['project_id'],
            'files' => 1,
            'replied_by' => $data['user_id']
        ]);
    }
}
