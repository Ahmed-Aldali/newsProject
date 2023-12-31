<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
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
        return auth()->user()->hasPermissionTo('Index-City')
        ? $this->allow()
        : $this->deny('can not open Index City');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Index City');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Index City');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Index City');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, City $city)
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
        return auth()->user()->hasPermissionTo('Create-City')
        ? $this->allow()
        : $this->deny('can not open Create City');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Create City');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Create City');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Create City');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-City')
        ? $this->allow()
        : $this->deny('can not open Edit City');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit City');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit City');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit City');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-City')
        ? $this->allow()
        : $this->deny('can not open Delete City');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete City');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete City');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-City')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete City');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, City $city)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, City $city)
    {
        //
    }
}
