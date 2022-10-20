<?php

namespace App\Repositories\Backend;

use App\Models\Appointment;
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
     *   */
    public function __construct(Appointment $appointment)
    {
        $this->model = $appointment;
    }

    public function addDelivery( array $data = [] ) : Appointment
    {
        dd( $data );
    }

    public function updateDelivery( array $data = [], $id ) : bool
    {

    }

    public function getDeliveries()
    {
        $deliveries = Appointment::orderBy('id','desc')->with('service', 'customer')->get();
        return $deliveries;
    }

    public function getDeliveredDeliveries()
    {
        $deliveries = Appointment::whereStatus('completed')->orderBy('id','desc')->with('service', 'customer')->get();
        return $deliveries;
    }

    public function getPendingDeliveries()
    {
        $deliveries = Appointment::where('status', '=' , 'booked')->orderBy('id','desc')->with( 'service', 'customer')->get();
        return $deliveries;
    }

    public function getDelivery( $id )
    {
        return Appointment::find( $id );
    }

    public function deleteDelivery( $id )
    {
        $delivery = Appointment::find( $id );
        if( $delivery->status == 'booked' )
        {
            $delivery->delete();
            return route('client.deliveries.index')->with('success', 'Appointment is deleted successfully.');
        }
        else 
        {
            return route('client.deliveries.index')->with('warning', 'This delivery cannot be deleted.');
        }
    }

    public function getBusinessAppoinyments( $company_id )
    {
        $appointments = Appointment::orderBy('from_time','desc')->whereCompanyId( $company_id )->get();
        return $appointments;
    }

  
}
