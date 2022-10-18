<?php

namespace App\Repositories;

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
            $company = Auth::user()->company;
            $branch = $this->model::create(
                [
                    'company_id' => $company->id
                ] + $data
            );

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
            $branch = $this->model::find( $id )->update(
                 $data
            );

        } catch (Exception $e) {
            
            DB::rollBack();
            throw new GeneralException(__('There was a problem in adding branch.'));
        
        }

        DB::commit();
        return $branch;

    }

    public function getBranches()
    {
        return Auth::user()->company->branches()->orderBy('name','asc')->get();
    }

    public function getBranch( $id )
    {
        return $this->model::find( $id );
    }

    public function deleteBranch( $id )
    {
        $branch = Branch::find( $id );
        if( $branch->deliveries()->count() > 0 ) return back()->with(['danger' => 'Branch cannot be deleted, because selected branch has active deliveries.']);
        $branch->delete();
        return back()->with(['success' => 'Branch is deleted successfully.']);
    }

  
}
