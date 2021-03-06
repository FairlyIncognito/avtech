<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory, Sluggable;

    CONST PAGINATION_COUNT = 10;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function user() {
        return $this->belongsTo(User::class);
    }


    public function category() {
        return $this->belongsTo(Category::class);
    }


    public function status() {
        return $this->belongsTo(Status::class);
    }
}