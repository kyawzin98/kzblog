<?php

namespace App\Policies;

use App\Model\User\User;
use App\Model\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function view(Admin $user)
    {
//        return $this->getPermission($user,4);
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Model\User\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,4);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function update( Admin $user)
    {
        return $this->getPermission($user,5);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user,6);
    }

    public function roles(Admin $user)
    {
        return $this->getPermission($user,10);
    }

    public function permissions(Admin $user)
    {
        return $this->getPermission($user,11);
    }

    /**
     * Determine whether the user can restore the admin.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the admin.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }

    protected function getPermission($user,$permission_id){
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->id == $permission_id){
                    return true;
                }
            }
        }
        return false;
    }
}
