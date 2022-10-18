<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Branch;
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
        $company_count  = Company::all()->count();
        $branches_count  = Branch::all()->count();
        $all_deliveries_count  = Delivery::all()->count();
        $pending_deliveries_count  = Delivery::whereStatus('booked')->count();
        $delivered_deliveries_count  = Delivery::whereStatus('delivered')->count();

        return view('backend.dashboard', compact( 'company_count','branches_count', 'all_deliveries_count', 'pending_deliveries_count', 'delivered_deliveries_count' ) );
    }
}
