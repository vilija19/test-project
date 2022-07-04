<?php

namespace App\Models;

class Label extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Get the tasks for the label.
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

}