<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $fillable = ['name', 'description', 'user_id',];

    protected $softCascade = ['tasks'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }


}
