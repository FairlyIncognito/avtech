<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function category() {
        return $this->hasMany(Category::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }  
}