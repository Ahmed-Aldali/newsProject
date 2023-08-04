<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
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
        return auth()->user()->hasPermissionTo('Index-Article')
        ? $this->allow()
        : $this->deny('can not open Index Article');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Article');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Article');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Article');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Article $article)
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
        return auth()->user()->hasPermissionTo('Create-Article')
        ? $this->allow()
        : $this->deny('can not open Create Article');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Article');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Article');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Article');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-Article')
        ? $this->allow()
        : $this->deny('can not open Edit Article');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Article');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Article');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Article');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-Article')
        ? $this->allow()
        : $this->deny('can not open Delete Article');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Article');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Article');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-Article')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Article');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }
}
