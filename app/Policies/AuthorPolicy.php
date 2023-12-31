<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
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
        return auth()->user()->hasPermissionTo('Index-Author')
        ? $this->allow()
        : $this->deny('can not open Index Author');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Author');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Author');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Author');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Author $author)
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
        return auth()->user()->hasPermissionTo('Create-Author')
        ? $this->allow()
        : $this->deny('can not open Create Author');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Author');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Author');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Author');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-Author')
        ? $this->allow()
        : $this->deny('can not open Edit Author');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Author');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Author');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Author');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-Author')
        ? $this->allow()
        : $this->deny('can not open Delete Author');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Author');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Author');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-Author')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Author');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Author $author)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Author $author)
    {
        //
    }
}
