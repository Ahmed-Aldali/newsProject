<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
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

            return auth()->user()->hasPermissionTo('Index-Slider')
            ? $this->allow()
            : $this->deny('can not open Index Slider');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Slider');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Slider');
        // }


        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Slider');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Index-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Slider');
        // }else{
        //     return auth()->user()->hasPermissionTo('Index-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Index Slider');
        // }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Slider $slider)
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
        return auth()->user()->hasPermissionTo('Create-Slider')
        ? $this->allow()
        : $this->deny('can not open Create Slider');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Slider');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Create-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Slider');
        // }else{
        //     return auth()->user()->hasPermissionTo('Create-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Create Slider');
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return auth()->user()->hasPermissionTo('Edit-Slider')
        ? $this->allow()
        : $this->deny('can not open Edit Slider');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Slider');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Edit-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Slider');
        // }else{
        //     return auth()->user()->hasPermissionTo('Edit-Slider')
        //     ? $this->allow()
        //     : $this->deny('can not open Edit Slider');
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return auth()->user()->hasPermissionTo('Delete-Delete')
        ? $this->allow()
        : $this->deny('can not open Delete Delete');

        // if(auth('admin')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Delete')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Delete');
        // }elseif(auth('author')->check()){
        //     return auth()->user()->hasPermissionTo('Delete-Delete')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Delete');
        // }else{
        //     return auth()->user()->hasPermissionTo('Delete-Delete')
        //     ? $this->allow()
        //     : $this->deny('can not open Delete Delete');
        // }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Slider $slider)
    {
        //
    }
}
