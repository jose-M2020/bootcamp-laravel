<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function taskuser() {
        return $this->belongsToMany(TaskUser::class);
    }
}
