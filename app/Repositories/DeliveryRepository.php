<?php

namespace App\Repositories;

use App\Models\Delivery;
use App\Models\Branch;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository.
 */
class DeliveryRepository 
{
        /**
     * UserService constructor.
     *
     * @param  User  $branch
     */
    public function __construct(Delivery $delivery)
    {
        $this->model = $delivery;
    }

    public function addDelivery( array $data = [] ) : Delivery
    {

    }

    public function updateDelivery( array $data = [], $id ) : bool
    {

    }

    public function getDeliveries()
    {
        $branch_ids = \Auth::user()->company->branches ? \Auth::user()->company->branches->pluck('id')->toArray() : [];
        $deliveries = Delivery::orderBy('id','desc')->whereIn('branch_id', $branch_ids )->with('branch','service')->get();
        return $deliveries;
    }

    public function getDeliveredDeliveries()
    {
        $deliveries = Delivery::whereStatus('delivered')->orderBy('id','desc')->with('branch','service')->get();
        return $deliveries;
    }

    public function getPendingDeliveries()
    {
        $deliveries = Delivery::where('status', '<>' , 'delivered')->orderBy('id','desc')->with('branch', 'service')->get();
        return $deliveries;
    }

    public function getDelivery( $id )
    {
        return Delivery::find( $id )->load('branch');
    }

    public function deleteDelivery( $id )
    {
        $delivery = Delivery::find( $id );
        if( $delivery->status == 'booked' )
        {
            $delivery->delete();
            return route('client.deliveries.index')->with('success', 'Delivery is deleted successfully.');
        }
        else 
        {
            return route('client.deliveries.index')->with('warning', 'This delivery cannot be deleted.');
        }
    }

  
}
