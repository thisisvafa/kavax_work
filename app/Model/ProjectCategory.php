<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = ['project_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
