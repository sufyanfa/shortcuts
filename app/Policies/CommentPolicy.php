<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Shortcut;
use App\Models\Comment;
use Auth;

use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function update(User $user, Shortcut $shortcut, Comment $comment)
    {
        return $user->id === $shortcut->user_id
        ? true 
        : false;
    }

}
