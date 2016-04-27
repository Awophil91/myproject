<?php


namespace Manager\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;
use Manager\Models\User;
use Manager\Models\Task;


class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param $user
     * @param $ability
     * @return bool
     * Sometimes, you may wish to grant all abilities to a specific user on a policy.
     * For this situation, define a before method on the policy.
     * This method will be run before all other authorization checks on the policy:
     */
    /*public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

    }*/

    /**
     * Determine if the given user can create a new task.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function postNew(User $user, Task $task)
    {
        /**if ($user->isSuperAdmin()) {
        return true;
        }*/
        return true;
    }

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function postDelete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
