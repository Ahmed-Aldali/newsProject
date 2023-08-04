<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
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
        return auth()->user()->hasPermissionTo('Index-Country')
        ? $this->allow()
        : $this->deny('can not open Index Country');


        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Country');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Country');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Country');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Country $country)
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
        return auth()->user()->hasPermissionTo('Create-Country')
        ? $this->allow()
        : $this->deny('can not open Create Country');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Country');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Country');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Country');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-Country')
        ? $this->allow()
        : $this->deny('can not open Edit Country');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Country');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Country');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Country');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-Country')
        ? $this->allow()
        : $this->deny('can not open Delete Country');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Country');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Country');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-Country')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Country');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Country $country)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Country $country)
    {
        //
    }
}