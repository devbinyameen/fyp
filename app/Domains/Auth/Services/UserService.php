<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\User\UserCreated;
use App\Domains\Auth\Events\User\UserDeleted;
use App\Domains\Auth\Events\User\UserDestroyed;
use App\Domains\Auth\Events\User\UserRestored;
use App\Domains\Auth\Events\User\UserStatusChanged;
use App\Domains\Auth\Events\User\UserUpdated;
use App\Domains\Auth\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class UserService.
 */
class UserService
{
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }


    /**
     * @param  array  $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function registerUser(array $data = [])
    {
        DB::beginTransaction();
        try 
        {
            $user = $this->repository->createUser( $data );
            $role = \App\Domains\Auth\Models\Role::whereType('user')->whereName('Client')->first();
            $user->assignRole( $role );
            $user->company()->create([
                'name'          => $data['company'],
                'email'         => $data['company_email'],
                'phone_number'  => $data['company_phone'],
                'address'       => $data['company_address'],
            ]);
        }
        catch( Exception  $e )
        {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating your account.'));

        }

        DB::commit();
        return $user;
    }

    public function getUserList()
    {
        return $this->repository->getUserList();
    }

    public function updateUser( array $data = [], $id )
    {
        return $this->repository->updateUser( $data, $id );
    }

    public function getPendingUserList(  )
    {
        return $this->repository->getPendingUserList( );
    }

    public function acceptRequest( $user )
    {
        return $this->repository->acceptRequest( $user );
    }

    public function deleteUser( $user )
    {
        return $this->repository->deleteUser( $user );

    }
    

}
