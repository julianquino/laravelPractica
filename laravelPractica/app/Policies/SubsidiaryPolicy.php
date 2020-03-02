<?php

namespace App\Policies;

use App\Subsidiary;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SubsidiaryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any subsidiaries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user) {
        return $user->company_id != null
            ? Response::allow()
            : Response::deny('No tienes una compañia');
    }

    /**
     * Determine whether the user can view the subsidiary.
     *
     * @param  \App\User  $user
     * @param  \App\Subsidiary  $subsidiary
     * @return mixed
     */
    public function view(User $user, Subsidiary $subsidiary) {
        return $user->company_id == $subsidiary->company_id;
    }

    /**
     * Determine whether the user can create subsidiaries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user) {
        return $user->company_id != null
            ? Response::allow()
            : Response::deny('No tienes una compañia');
    }

    /**
     * Determine whether the user can update the subsidiary.
     *
     * @param  \App\User  $user
     * @param  \App\Subsidiary  $subsidiary
     * @return mixed
     */
    public function update(User $user, Subsidiary $subsidiary) {
        return $user->company_id == $subsidiary->company_id && $user->isPermittedEditSubsidiary($user->company, $subsidiary);
    }

    /**
     * Determine whether the user can delete the subsidiary.
     *
     * @param  \App\User  $user
     * @param  \App\Subsidiary  $subsidiary
     * @return mixed
     */
    public function delete(User $user, Subsidiary $subsidiary) {
        return $user->company_id == $subsidiary->company_id ;
    }

    /**
     * Determine whether the user can restore the subsidiary.
     *
     * @param  \App\User  $user
     * @param  \App\Subsidiary  $subsidiary
     * @return mixed
     */
    public function restore(User $user, Subsidiary $subsidiary)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the subsidiary.
     *
     * @param  \App\User  $user
     * @param  \App\Subsidiary  $subsidiary
     * @return mixed
     */
    public function forceDelete(User $user, Subsidiary $subsidiary)
    {
        //
    }
}
