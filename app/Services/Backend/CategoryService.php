<?php

namespace App\Services\Backend;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\Backend\CategoryRepository;

/**
 * Class UserService.
 */
class CategoryService
{
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }


    /**
     * @param  array  $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function getServices(array $data = [])
    {
        $branches =  $this->repository->getServices();
        return $branches;
    }

    public function getService( $id )
    {
        return $this->repository->getService( $id );
    }


    public function addService( array $data = [])
    {
        return $this->repository->addService( $data );
    }

    public function updateService( $data, $id )
    {
        return $this->repository->updateService( $data, $id );
    }

    public function deleteService( $id )
    {
        return $this->repository->deleteService( $id );
    }
    

}
