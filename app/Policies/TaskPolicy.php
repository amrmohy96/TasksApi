<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user, $id)
    {
        return $user->id === Project::whereId($id)->first()->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Models\Task $task
     * @return mixed
     */
    public function update(User $user, Task $task)
    {
        return $user->id === $task->project->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Models\Task $task
     * @return mixed
     */
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->project->user_id;
    }

}
