<?php

namespace App\Models;


/**
 * @property int $id
 * @property bigInteger $creator_id
 * @property string $title
 * @property text $content
 * @property bigInteger $status_id
 * @property Collection $labels
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Task extends \Illuminate\Database\Eloquent\Model
{
    use \Vilija19\Modelshistory\ModelsHistoryTrait;

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