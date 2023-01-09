<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebMaintenance extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

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
}
