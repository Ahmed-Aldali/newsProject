<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny()
    {
        return auth()->user()->hasPermissionTo('Index-Comment')
        ? $this->allow()
        : $this->deny('can not open Index Comment');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Comment');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Comment');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Comment');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        return auth()->user()->hasPermissionTo('Create-Comment')
        ? $this->allow()
        : $this->deny('can not open Create Comment');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Comment');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Comment');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Comment');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-Comment')
        ? $this->allow()
        : $this->deny('can not open Edit Comment');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Comment');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Comment');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Comment');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-Comment')
        ? $this->allow()
        : $this->deny('can not open Delete Comment');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Comment');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Comment');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-Comment')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Comment');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
