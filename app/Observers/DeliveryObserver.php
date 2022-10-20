<?php

namespace App\Observers;

use App\Models\Delivery;
use App\Models\DeliveryLog;
use App\Models\DeliveryTimeline;
use DB;
use Auth;

class DeliveryObserver
{
    /**
     * Handle the Delivery "created" event.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return void
     */ 

    private $user_id = null;

    public function __construct()
    {
        $this->user_id = Auth::user()->id;
    }

    public function created(Delivery $delivery)
    {
        DB::beginTransaction();
        try{
            DeliveryTimeline::create([
                'delivery_id' => $delivery->id,
                'user_id' => $this->user_id,
                'status' => 'booked',
            ]);
        }
        catch( \Exception $e ){
            DB::rollback();
        }

        DB::commit();
        
    }

    /**
     * Handle the Delivery "updated" event.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return void
     */
    public function updated(Delivery $delivery)
    {
        DB::beginTransaction();
        try{

            if( count($delivery->getChanges()) > 1 )
            {
                $data = $delivery->getChanges();
                unset( $data['updated_at'] );
                DeliveryLog::create([
                    'delivery_id' => $delivery->id,
                    'user_id' => $this->user_id,
                    'data' => json_encode( $data ),
                ]);
            }
            

            if( $delivery->isDirty('status') )
            {
                DeliveryTimeline::create([
                    'delivery_id' => $delivery->id,
                    'user_id' => $this->user_id,
                    'previous_status' => $delivery->getOriginal('status'),
                    'status' => $delivery->status
                ]);
            }
        }
        catch( \Exception $e ){
            DB::rollback();
        }

        DB::commit();
    }

    /**
     * Handle the Delivery "deleted" event.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return void
     */
    public function deleted(Delivery $delivery)
    {
        //
    }

    /**
     * Handle the Delivery "restored" event.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return void
     */
    public function restored(Delivery $delivery)
    {
        //
    }

    /**
     * Handle the Delivery "force deleted" event.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return void
     */
    public function forceDeleted(Delivery $delivery)
    {
        //
    }
}
