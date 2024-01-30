<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'second_last_name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function todos()
    {
        return $this->hasMany(Todo::class);        
    }

    // public function tasks()
    // {
    //     return $this->belongsToMany(Task::class)
    //         ->withPivot('name')
    //         ->withTimestamps();        
    // }

    // Use "using" function when you have fields that is related to other table
    public function tasks()
    {
        return $this->belongsToMany(Task::class)
            ->using(TaskUser::class);        
    }     
}
