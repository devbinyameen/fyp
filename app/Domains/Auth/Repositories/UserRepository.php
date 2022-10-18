<?php

namespace App\Domains\Auth\Repositories;

use App\Domains\Auth\Models\User;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository.
 */
class UserRepository 
{
        /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function createUser( array $data = [] ) : User
    {
        DB::beginTransaction();

        try {
            
            $user = $this->model::create($data);

        } catch (Exception $e) {
            
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating your account.'));
        
        }

        DB::commit();
        return $user;

    }

    public function getUserList()
    {
        return $this->model::where('status', '<>','0' )->orderBy('first_name', 'asc')->orderBy('last_name', 'asc')->get();
    }

    public function updateUser( array $data, $id ) : bool
    {
        DB::beginTransaction();

        try {
            
            $user = $this->model::whereId( $id )->update( $data );
        } catch (Exception $e) {
            
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating user.'));
        
        }
        DB::commit();
        return $user;
    }

    public function getPendingUserList()
    {
        return $this->model::whereStatus(0)->orderBy('first_name', 'asc')->orderBy('last_name', 'asc')->get();
    }

    public function acceptRequest( $user )
    {
        DB::beginTransaction();

        try {
            $user->update( ['status' => 1 ] );
        } catch (Exception $e) {
            
            DB::rollBack();
            throw new GeneralException(__('There was a problem accepting user request.'));
        
        }
        DB::commit();
    }

    public function deleteUser( $user )
    {
        $user->delete();
        return back()->with([ 'success' => 'The user was successfully deleted.' ]);
    }

  
}
