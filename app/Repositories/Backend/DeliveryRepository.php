<?php

namespace App\Repositories\Backend;

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

    public function addDelivery( array $data = [] )
    {
        DB::beginTransaction();

        try {

            foreach( $data as $delivery )
            {
                $branch = Branch::find( $delivery['branch_id'] );
                $delivery = $this->model::create( 
                    $delivery +
                [
                    'sender_phone' => $branch->phone,
                    'sender_city' => $branch->city,
                    'sender_address' => $branch->address,
                ] );
            }
            
        } catch (Exception $e) {
            
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()],500);
        
        }

        DB::commit();
        return response()->json(['message' => 'Delivery is added successfully.'],201);

    }

    public function updateDelivery( array $data = [], $id )
    {
        DB::beginTransaction();

        try {
            $branch = Branch::find( $data['branch_id'] );
            $delivery = $this->model::find( $id )->update(
            $data +
            [
                'sender_phone' => $branch->phone,
                'sender_city' => $branch->city,
                'sender_address' => $branch->address,
            ] );
        } catch (Exception $e) {
            
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()],500);
        
        }
        DB::commit();
        return response()->json(['message' => 'Delivery is updated successfully.'],200);

    }

    public function getDeliveries()
    {
        $branche_ids = Branch::all() ? Branch::all()->pluck('id')->toArray() : [];
        $deliveries = Delivery::whereIn('branch_id', $branche_ids )->orderBy('id','desc')->with('branch', 'service')->get();
        return $deliveries;
    }

    public function getDeliveredDeliveries()
    {
        $deliveries = Delivery::whereStatus('delivered')->orderBy('id','desc')->with('branch','service')->get();
        return $deliveries;
    }

    public function getPendingDeliveries()
    {
        $deliveries = Delivery::where('status', '<>', 'delivered')->orderBy('id','desc')->with('branch', 'service')->get();
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
