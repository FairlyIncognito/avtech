<?php

namespace App\Models;

use App\Models\Idea;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function ideas() {
        return $this->hasMany(Idea::class);
    }

    public function getAvatar() {
        return
            'https://www.gravatar.com/avatar/'
            .md5($this->email)
            .'?s=200'
            .'&d=retro';
    }

    public function isAdmin() {
        return in_array($this->email, [
            'mickeybrasmussen@gmail.com',
            'admin@avtech.com',
        ]);
    }
}