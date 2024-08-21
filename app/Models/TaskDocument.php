<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDocument extends Model
{
    use HasFactory;

    public function getdocumentPathAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
}
