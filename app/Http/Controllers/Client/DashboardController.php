<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Delivery;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $branches_count  = Auth::user()->company->branches->count();
        $all_deliveries_count  = Delivery::all()->count();
        $pending_deliveries_count  = Delivery::whereStatus('booked')->count();
        $delivered_deliveries_count  = Delivery::whereStatus('delivered')->count();

        return view('client.dashboard', compact( 'branches_count', 'all_deliveries_count', 'pending_deliveries_count', 'delivered_deliveries_count' ) );
    }
}
