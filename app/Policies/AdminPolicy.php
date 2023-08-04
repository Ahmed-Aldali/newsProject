<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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
        return auth()->user()->hasPermissionTo('Index-Admin')
        ? $this->allow()
        : $this->deny('can not open Index Admin');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Admin');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Admin');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Admin');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Admin $admin)
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
        return auth()->user()->hasPermissionTo('Create-Admin')
        ? $this->allow()
        : $this->deny('can not open Create Admin');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Admin');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Admin');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Admin');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-Admin')
            ? $this->allow()
            : $this->deny('can not open Edit Admin');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Admin');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Admin');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Admin');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-Admin')
        ? $this->allow()
        : $this->deny('can not open Delete Admin');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Admin');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Admin');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-Admin')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Admin');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }
}
