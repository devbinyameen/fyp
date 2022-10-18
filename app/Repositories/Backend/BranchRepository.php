<?php

namespace App\Repositories\Backend;

use App\Models\Branch;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Auth;

/**
 * Class UserRepository.
 */
class BranchRepository 
{
        /**
     * UserService constructor.
     *
     * @param  User  $branch
     */
    public function __construct(Branch $branch)
    {
        $this->model = $branch;
    }

    public function addBranch( array $data = [] ) : Branch
    {
        DB::beginTransaction();

        try {
            $branch = $this->model::create( $data );
        } catch (Exception $e) {
            
            DB::rollBack();
            throw new GeneralException(__('There was a problem in adding branch.'));
        
        }

        DB::commit();
        return $branch;

    }

    public function updateBranch( array $data = [], $id ) : bool
    {
        DB::beginTransaction();

        try {
            $branch = $this->model::find( $id )->update( $data );
        } catch (Exception $e) {
            
            DB::rollBack();
            throw new GeneralException(__('There was a problem in updating branch.'));
        
        }

        DB::commit();
        return $branch;

    }

    public function getBranches()
    {
        $branches = Branch::orderBy('name','asc')->with('company')->get();
        return $branches;
    }

    public function getBranch( $id )
    {
        return Branch::find( $id )->first();
    }

    public function deleteBranch( $id )
    {
        $branch = Branch::find( $id );
        if( $branch->deliveries()->count() > 0 ) return back()->with(['danger' => 'Branch cannot be deleted, because selected branch has active deliveries.']);
        $branch->delete();
        return back()->with(['success' => 'Branch is deleted successfully.']);
    }

  
}
