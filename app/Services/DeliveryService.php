<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\DeliveryRepository;

/**
 * Class UserService.
 */
class DeliveryService
{
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(DeliveryRepository $deliveryRepository)
    {
        $this->repository = $deliveryRepository;
    }


    /**
     * @param  array  $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function getDeliveries()
    {
        return  $this->repository->getDeliveries();
    }

    public function getDeliveredDeliveries()
    {
        return  $this->repository->getDeliveredDeliveries();
    }

    public function getPendingDeliveries()
    {
        return  $this->repository->getPendingDeliveries();
    }

    public function getDelivery( $id )
    {
        return  $this->repository->getDelivery( $id );
    }


    public function addDelivery( array $data = [] )
    {
        return $this->repository->addDelivery( $data );
    }

    public function updateDelivery( array $data = [], $id)
    {
        return $this->repository->updateDelivery( $data, $id );
    }

    public function deleteDelivery( $id )
    {
        return $this->repository->deleteDelivery( $id );
    }
    

}
