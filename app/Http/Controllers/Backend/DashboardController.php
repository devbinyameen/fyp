<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Appointment;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    public function __construct(  )
    {

    } 


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $company_count  = Company::all()->count();
        $all_appointments_count  = Appointment::all()->count();
        $pending_appointments_count  = Appointment::whereStatus('requested')->count();
        $in_progress_appointments_count  = Appointment::whereStatus('completed')->count();

        return view('backend.dashboard', compact( 'company_count', 'all_appointments_count', 'pending_appointments_count', 'in_progress_appointments_count' ) );
    }
}
