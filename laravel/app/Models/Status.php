<?php

namespace App\Models;

/**
 * @property int $id
 * @property string $name
 * @property Collection $tasks
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
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