<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $fillable = ['name', 'description', 'project_id', 'status'];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
