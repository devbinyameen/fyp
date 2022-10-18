<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\ServiceService;
use DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct( ServiceService $servicesService  )
    {
        $this->service = $servicesService;
        $this->directory = 'backend.services.';
    } 


    public function index( Request $request )
    {
        if ($request->ajax()) {

            $data = $this->service->getServices();
            return Datatables::of($data)
                    ->addIndexColumn()  
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="services/'.$row['id'].'/edit" class="edit btn btn-primary btn-sm"> Edit </a>';
                           $btn .= '
                           <form action="services/'.$row['id'].'" method="POST">
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
        return view( $this->directory.'form' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->addService( $request->all() );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = $this->service->getService( $id );
        return view( $this->directory.'form', compact('service') );
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
        $this->service->updateService( $request->all(), $id );
        return redirect( route('admin.services.index') )->with([ 'success' => 'Service is updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->deleteService($id);
        return redirect( route('admin.services.index') )->with([ 'success' => 'Service is deleted successfully.']);
    }
}
