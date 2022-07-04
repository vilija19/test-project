<?php

namespace App\Models;

class Task extends \Illuminate\Database\Eloquent\Model
{
    protected $name;
    /**
     * Get the status for the task.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the labels for the task.
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

}