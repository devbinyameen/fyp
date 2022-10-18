<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BranchRepository;

/**
 * Class UserService.
 */
class BranchService
{
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(BranchRepository $branchRepository)
    {
        $this->repository = $branchRepository;
    }


    /**
     * @param  array  $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function getBranches()
    {
        $branches =  $this->repository->getBranches();
        return $branches;
    }

    public function getBranch( $id )
    {
        return $this->repository->getBranch( $id );
    }


    public function addBranch( array $data = [])
    {
        return $this->repository->addBranch( $data );
    }

    public function updateBranch( array $data = [], $id)
    {
        return $this->repository->updateBranch( $data, $id );
    }

    public function deleteBranch( $id )
    {
        return $this->repository->deleteBranch( $id );
    }
    

}
