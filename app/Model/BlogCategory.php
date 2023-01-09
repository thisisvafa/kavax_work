<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class, 'cat');
    }

    public function allData()
    {
        return $this->orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
    }

    public function create($data)
    {
        $this->fill($data);
        return $this->save();
    }

    public function edit($cat_id, $data)
    {
        $cat = $this->find($cat_id);
        $cat->fill($data);
        return $cat->save();
    }

    public static function view($cat_id)
    {
        return self::find($cat_id);
    }

    public function deleteCat($cat_id)
    {
        $cat = $this->findOrFail($cat_id);
        return $cat->delete();
    }
}
