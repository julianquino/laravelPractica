<?php

namespace App\Policies;

use App\Shift;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class ShiftPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any shifts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user) {
        return $user->company != null && count($user->company->subsidiaries) !=0
            ? Response::allow()
            : Response::deny('No tienes una filial');
    }

    /**
     * Determine whether the user can view the shift.
     *
     * @param  \App\User  $user
     * @param  \App\Shift  $shift
     * @return mixed
     */
    public function view(User $user, Shift $shift) {
        return $user->company_id == $shift->subsidiary->company_id;
    }

    /**
     * Determine whether the user can create shifts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user) {
        return $user->company != null && count($user->company->subsidiaries) !=0
            ? Response::allow()
            : Response::deny('No tienes una filial');
    }

    /**
     * Determine whether the user can update the shift.
     *
     * @param  \App\User  $user
     * @param  \App\Shift  $shift
     * @return mixed
     */
    public function update(User $user, Shift $shift) {
        if($user->company_id == $shift->subsidiary->company_id) {
            if($user->isPermittedEditShift($user->company, $shift->subsidiary, $shift)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the shift.
     *
     * @param  \App\User  $user
     * @param  \App\Shift  $shift
     * @return mixed
     */
    public function delete(User $user, Shift $shift) {
        return $user->company_id == $shift->subsidiary->company_id;
    }

    /**
     * Determine whether the user can restore the shift.
     *
     * @param  \App\User  $user
     * @param  \App\Shift  $shift
     * @return mixed
     */
    public function restore(User $user, Shift $shift)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the shift.
     *
     * @param  \App\User  $user
     * @param  \App\Shift  $shift
     * @return mixed
     */
    public function forceDelete(User $user, Shift $shift)
    {
        //
    }
}
