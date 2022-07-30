<?php

namespace App\Models;

/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property Collection $tasks
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
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