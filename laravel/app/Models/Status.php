<?php

namespace App\Models;

class Status extends \Illuminate\Database\Eloquent\Model
{
    protected $name;
    /**
     * Get the tasks for the status.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}