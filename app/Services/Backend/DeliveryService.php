<?php

namespace App\Services\Backend;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\Backend\DeliveryRepository;
use App\Models\Service;

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
    private $delivery_charges = 0;
    private $charges_per_weight = array();
    private $additional_charges = array();

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
        foreach( $data as $index => $delivery )
        {
            $this->getServiceCharges( $delivery );
            if( $delivery['payment_method'] == 'COD' )
            {
                $data[$index]['total_charges'] = $this->delivery_charges + $delivery['cod_amount'];
            }
            else
            {
                $data[$index]['total_charges'] = $this->delivery_charges;
            }
        }

        return $this->repository->addDelivery( $data );
    }

    public function updateDelivery( array $data = [], $id)
    {
        $this->getServiceCharges( $data );
        if( $data['payment_method'] == 'COD' )
        {
            $data['total_charges'] = $this->delivery_charges + $data['cod_amount'];
        }
        else
        {
            $data['total_charges'] = $this->delivery_charges;
        }
        return $this->repository->updateDelivery( $data, $id );
    }

    public function deleteDelivery( $id )
    {
        return $this->repository->deleteDelivery( $id );
    }

    private function getServiceCharges( $data )
    {
        $reciver_service_area = ServiceArea::whereCity( $data['reciever_city'] )->first()->toArray();
        $sender_service_area = ServiceArea::whereCity( $this->getBranchCity( $data['branch_id'] ) )->first()->toArray();
        $service = Service::select('slug')->whereId( $data['service_id'] )->first();
        
        switch( $service->slug )
        {
            case "same-day":
                            $this->getSameDayCharges( $data['weight'], $reciver_service_area ,$sender_service_area );
                            break;

            case "over-night":
                            $this->getOverNightCharges( $data['weight'] ,$reciver_service_area, $sender_service_area );
                            break;
        }

    }

    private function getBranchCity( $branch_id )
    {
        return Branch::find( $branch_id )->get()->pluck('city');
    }

    private function getOverNightCharges( $delivery_weight ,$reciver_service_area, $sender_service_area )
    {
        if( $sender_service_area['city_slug'] == $reciver_service_area['city_slug'] )
        {
            $service_scope = Service::whereSlug('over-night')
            ->with('children', function($q) use ( $reciver_service_area )
            { 
                $q->where('slug', 'within-city' ); 
            })->first()->children->toArray()[0];

        }
        else
        {
            $service_scope = Service::whereSlug('over-night')
            ->with('children', function($q) use ( $reciver_service_area )
            { 
                $q->where('slug', strtolower( $reciver_service_area['province'] ) ); 
            })->first()->children->toArray()[0];
        }

        $this->setCharges( $service_scope['children'] ); 
        $this->getDeliveryCharges( $delivery_weight );

    }

    public function getSameDayCharges( $delivery_weight, $reciver_service_area ,$sender_service_area )
    {
        if( $sender_service_area['city_slug'] == $reciver_service_area['city_slug'] )
        {
            $service_scope = Service::whereSlug('same-day')
            ->with('children', function($q) use ( $reciver_service_area )
            { 
                $q->where('slug', 'within-city' ); 
            })->first()->children->toArray()[0];
        }
        else
        {
            $service_scope = Service::whereSlug('same-day')
            ->with('children', function($q) use ( $reciver_service_area )
            { 
                $q->where('slug', 'city-to-city' ); 
            })->first()->children->toArray()[0];
        }

        $this->setCharges( $service_scope['children'] ); 
        $this->getDeliveryCharges( $delivery_weight );
        

    }


    private function getDeliveryCharges( $delivery_weight  )
    {
        $actual_weight = [];
        foreach(  $this->charges_per_weight as $row )
        {
            if( $row['weight'] == $delivery_weight )
            {
                $actual_weight = $row;
            }
        }

        if( count($actual_weight) > 0 )
        {
            $this->delivery_charges = $actual_weight['charges'];
        }
        else
        {
            $total_charges = $this->charges_per_weight[ count( $this->charges_per_weight ) - 1 ]['charges'] ;
            $remaining_weight = floatval( $delivery_weight ) - floatval( $this->charges_per_weight[ count($this->charges_per_weight) - 1 ]['weight']);
            if( floatval( $remaining_weight - floor($remaining_weight)) > 0 ) $remaining_weight = intval( $remaining_weight ) + 1;

            if( $remaining_weight <= 10 )
            {
                $total_charges += $remaining_weight * $this->additional_charges['additional_weight_upto_10kg'];
            }
            elseif( $remaining_weight > 10 && $remaining_weight <=20 )
            {
                $total_charges +=  10 * $this->additional_charges['additional_weight_upto_10kg'];
                $remaining_weight -= 10;
                $total_charges += $remaining_weight * $this->additional_charges['additional_weight_upto_20kg'];
            }
            elseif( $remaining_weight > 20  )
            {
                $total_charges += ( 10 * $this->additional_charges['additional_weight_upto_10kg'] );
                $remaining_weight -= 10;
                $total_charges +=  ( 10 * $this->additional_charges['additional_weight_upto_20kg'] );
                $remaining_weight -= 10;
                $total_charges += $remaining_weight  * $this->additional_charges['additional_weight_upto_30kg'];

            }
            $this->delivery_charges =  $total_charges;
        }


    }

    private function setCharges( array $charges  )
    {
        foreach( $charges as $charge )
        {
            if( $charge['service_level'] == "weight" )
            {
                $weight_charge = array();
                $weight_charge["weight"] = $charge['slug'];
                $weight_charge["charges"] = $charge['charges'];
                array_push( $this->charges_per_weight, $weight_charge );
            }
            elseif( $charge['service_level'] == "additional_weight_upto_10kg" )
            {
                $this->additional_charges['additional_weight_upto_10kg'] = $charge['charges'];
            }
            elseif( $charge['service_level'] == "additional_weight_upto_20kg" )
            {
                $this->additional_charges['additional_weight_upto_20kg'] = $charge['charges'];
            }
            elseif( $charge['service_level'] == "additional_weight_upto_30kg" )
            {
                $this->additional_charges['additional_weight_upto_30kg'] = $charge['charges'];
            }
        }

    }
    public function getBusinessAppoinyments( $company_id )
    {
        return $this->repository->getBusinessAppoinyments( $company_id );
    }
    

}
