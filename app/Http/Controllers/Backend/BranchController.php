<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Services\Backend\BranchService;
use App\Models\Company;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct( BranchService $branchService  )
    {
        $this->service = $branchService;
        $this->directory = 'backend.branches.';
    } 

    public function index(Request $request )
    {
        if ($request->ajax()) {

            $data = $this->service->getBranches();
            return Datatables::of($data)
                    ->addIndexColumn()  
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="branches/'.$row['id'].'/edit" class="edit btn btn-primary btn-sm"> Edit </a>';
                           $btn .= '
                           <form action="branches/'.$row['id'].'" method="POST">
                                '.csrf_field().method_field("DELETE").'
                                <button class="btn btn-danger btn-sm" type="submit"> Delete </button> </form></div>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view( $this->directory.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('name', 'asc')->get();
        return view( $this->directory.'.form', compact('companies') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->addBranch( $request->all() );
        return redirect()->route('admin.branches.index')->with([ 'success' => 'Branch is added successfully.']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch =  $this->service->getBranch( $id );
        return $branch;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch =  $this->service->getBranch( $id );
        $companies = Company::orderBy('name', 'asc')->get();
        $company = Company::find( $branch->company_id );

        return view( $this->directory.'form', compact('branch', 'companies', 'company') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->service->updateBranch( $request->all(), $id );
        return redirect()->route('admin.branches.index')->with([ 'success' => 'Branch is updated successfully.']);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return  $this->service->deleteBranch( $id );  
    }
}
