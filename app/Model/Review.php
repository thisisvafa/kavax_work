<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'company', 'description', 'image'];

    public function allData()
    {
        return $this->orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
    }

    public function create($data)
    {
        $this->fill($data);
        return $this->save();
    }

    public function edit($id, $data)
    {
        $cat = $this->find($id);
        $cat->fill($data);
        return $cat->save();
    }

    public static function view($id)
    {
        return self::find($id);
    }

    public function deleteReview($id)
    {
        $cat = $this->findOrFail($id);
        return $cat->delete();
    }
}
