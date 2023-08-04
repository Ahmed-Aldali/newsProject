<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
        return auth()->user()->hasPermissionTo('Index-Category')
        ? $this->allow()
        : $this->deny('can not open Index Category');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Category');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Category');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Category');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Category $category)
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
        return auth()->user()->hasPermissionTo('Create-Category')
        ? $this->allow()
        : $this->deny('can not open Create Category');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Category');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Category');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Category');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-Category')
        ? $this->allow()
        : $this->deny('can not open Edit Category');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Category');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Category');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Category');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-Category')
        ? $this->allow()
        : $this->deny('can not open Delete Category');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Category');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Category');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-Category')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Category');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Category $category)
    {
        //
    }
}
