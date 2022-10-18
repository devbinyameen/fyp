<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Auth;

/**
 * Class UserRepository.
 */
class CategoryRepository 
{
        /**
     * UserService constructor.
     *
     * @param  User  $service
     */
    public function __construct(Category $service)
    {
        $this->model = $service;
    }

    public function addService( array $data = [] )
    {
        DB::beginTransaction();

        try {

                $this->model::create( $dat );

            
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
        $servicees = $this->model::orderBy('service_title','asc')->get();
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
