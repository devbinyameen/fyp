<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Services\Backend\DeliveryService as AdminDeliveryService;
use App\Services\DeliveryService;
use App\Models\Service;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct( DeliveryService $deliveryService  )
    {
        $this->service = $deliveryService;
        $this->directory = 'client.deliveries.';
    } 

    public function index(Request $request )
    {
        if ($request->ajax()) {
            $data = $this->service->getDeliveries();
            return Datatables::of($data)
                    ->addIndexColumn()  
                    ->addColumn('action', function($row){
                        $btn = '<a href="deliveries/'.$row['id'].'/edit" class="float-left edit btn btn-success btn-sm">Edit</a>';
                        $btn .= '
                           <form action="deliveries/'.$row['id'].'" method="POST">
                                '.csrf_field().method_field("DELETE").'
                                <button class="ml-1 btn btn-danger btn-sm" type="submit"> Delete </button> </form></div>';
                        return $btn;
                    })
                    ->addColumn('rider', function ( $row ){
                        if( isset( $row->rider ) )
                        {
                            return "<p class='text-info'><b>".$row->rider->full_name."</b></p>";
                        }
                        return "<p class='badge badge-warning'> Not Assigned </p>";
                    } )
                    ->rawColumns(['action', 'rider'])
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
        $branches = \Auth::user()->company->branches()->orderBy('name','asc')->get();
        $services = Service::whereStatus('active')->whereServiceLevel('service')->orderBy('name','asc')->with('children')->get();

        return view( $this->directory.'.form', compact('branches', 'services') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AdminDeliveryService $admin_delivery_service)
    {
        return $admin_delivery_service->addDelivery( $request->all() );
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
        $delivery = $this->service->getDelivery( $id );
        $branches = \Auth::user()->company->branches()->orderBy('name','asc')->get();
        $services = Service::whereStatus('active')->whereServiceLevel('service')->orderBy('name','asc')->with('children')->get();

        return view( $this->directory. 'form', compact('delivery', 'branches', 'services') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, AdminDeliveryService $admin_delivery_service)
    {
        return $admin_delivery_service->updateDelivery( $request->except('_token', '_method'), $id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->deleteDelivery( $id );
        return redirect()->route('client.deliveries.index')->with([ 'success' => 'Delivery is deleted successfully.']);
    }

    public function delivered(Request $request )
    {
        if ($request->ajax()) {
            $data = $this->service->getDeliveredDeliveries();
            return Datatables::of($data)
                    ->addIndexColumn()  
                    ->addColumn('rider', function ( $row ){
                        if( isset( $row->rider ) )
                        {
                            return "<p class='text-info'><b>".$row->rider->full_name."</b></p>";
                        }
                        return "<p class='badge badge-warning'> Not Assigned </p>";
                    } )
                    ->addColumn('status', function ( $row ){
                        return "<p class='badge badge-success'> Delivered </p>";
                    } )
                    ->rawColumns(['rider','status'])
                    ->make(true);
        }

        return view( $this->directory.'delivered');
    }


    public function pending(Request $request )
    {
        if ($request->ajax()) {
            $data = $this->service->getPendingDeliveries();
            return Datatables::of($data)
                    ->addIndexColumn()  
                    ->addColumn('rider', function ( $row ){
                        if( isset( $row->rider ) )
                        {
                            return "<p class='text-info'><b>".$row->rider->full_name."</b></p>";
                        }
                        return "<p class='badge badge-warning'> Not Assigned </p>";
                    } )
                    ->addColumn('action', function($row){
                        $btn = '<a href="deliveries/'.$row['id'].'/edit" class="float-left edit btn btn-success btn-sm">Edit</a>';
                        $btn .= '
                           <form action="deliveries/'.$row['id'].'" method="POST">
                                '.csrf_field().method_field("DELETE").'
                                <button class="btn btn-danger btn-sm" type="submit"> Delete </button> </form></div>';
                        return $btn;
                    })
                    ->rawColumns(['rider','action'])
                    ->make(true);
        }

        return view( $this->directory.'pending');
    }

}
