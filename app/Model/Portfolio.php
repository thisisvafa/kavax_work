<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;
    use Sluggable;
    /* Relationship to User */
    public function user_tbl()
    {
        return $this->belongsTo(User::class, 'uid', 'id');
    }

    use SoftDeletes;
    protected $table = 'portfolio';
    protected $fillable = [
        'uid',
        'title',
        'slug',
        'grid',
        'thumbnail',
        'service_id',
        'content',
        'website_url',
        'logo'
    ];
    public $timestamps = true;
    protected $date = ['deleted_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsToMany(Services::class, 'portfolios_category', 'portfolios_id', 'category_id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }
}
