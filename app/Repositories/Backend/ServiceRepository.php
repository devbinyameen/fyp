<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Auth;

/**
 * Class UserRepository.
 */
class ServiceRepository 
{
        /**
     * UserService constructor.
     *
     * @param  User  $service
     */
    public function __construct(Service $service)
    {
        $this->model = $service;
    }

    public function addService( array $data = [] )
    {
        DB::beginTransaction();

        try {
            $service = $this->model::create([
                'name' => $data['service'],
                'slug' => str_replace(' ','-',strtolower( $data['service'] )),
                'service_level' => "service",
                'status' => $data['status'],
                ]);

            foreach( $data['scopes'] as $scope )
            {
                $scope_obj = $this->model::create([
                    'name' => $scope['title'],
                    'slug' => str_replace(' ','-',strtolower( $scope['title'] )),
                    'service_level' => "service_scope",
                    'status' => $scope['status'],
                    'parent_id' => $service->id,
                    ]);

                foreach( $scope['weights'] as $weight )
                {
                    $this->model::create([
                        'name' => $weight['weight'],
                        'slug' => str_replace(' ','-',strtolower( $weight['weight'] )),
                        'service_level' => "weight",
                        'parent_id' => $scope_obj->id,
                        'charges' => $weight['charges'],
                    ]);
                }

                // Saving additional charges
                
                $this->model::create([
                    'name' => $scope['additional_weight_upto_10kg']['weight_limit'],
                    'slug' => str_replace(' ','-',strtolower( $scope['additional_weight_upto_10kg']['weight_limit'] )),
                    'service_level' => "additional_weight_upto_10kg",
                    'parent_id' => $scope_obj->id,
                    'charges' => $scope['additional_weight_upto_10kg']['charges_per_kg'],
                ]);

                $this->model::create([
                    'name' => $scope['additional_weight_upto_20kg']['weight_limit'],
                    'slug' => str_replace(' ','-',strtolower( $scope['additional_weight_upto_20kg']['weight_limit'] )),
                    'service_level' => "additional_weight_upto_20kg",
                    'parent_id' => $scope_obj->id,
                    'charges' => $scope['additional_weight_upto_20kg']['charges_per_kg'],
                ]);

                $this->model::create([
                    'name' => $scope['additional_weight_upto_30kg']['weight_limit'],
                    'slug' => str_replace(' ','-',strtolower( $scope['additional_weight_upto_30kg']['weight_limit'] )),
                    'service_level' => "additional_weight_upto_30kg",
                    'parent_id' => $scope_obj->id,
                    'charges' => $scope['additional_weight_upto_30kg']['charges_per_kg'],
                ]);

            }
            
        } catch (Exception $e) {        
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()],500);
    
        }

        DB::commit();
        return response()->json(['message' => 'Service is added successfully.'],201);

    }

    public function updateService( array $data = [], $id ) : bool
    {
        DB::beginTransaction();

        try {
            $service = $this->model::find( $id )->update( $data );
        } catch (Exception $e) {
            
            DB::rollBack();
            throw new GeneralException(__('There was a problem in updating Service.'));
        
        }

        DB::commit();
        return $service;

    }

    public function getServices()
    {
        $servicees = $this->model::orderBy('name','asc')->get();
        return $servicees;
    }

    public function getService( $id )
    {
        return $this->model::find( $id );
    }

    public function deleteService( $id )
    {
        $servicees = $this->model::find( $id )->delete();
    }

  
}
