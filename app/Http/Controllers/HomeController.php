<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Appointment;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function booking()
    {
        $companies = Company::all();
        return view('frontend.pages.booking', compact('companies'));
    }

    public function calendar( $company_id )
    {
        $company = Company::find( $company_id );
        $services = Service::all();
        return view('frontend.pages.calendar', compact('company', 'services'));
    }

    public function postCalendar( Request $request )
    {
        Appointment::create( $request->all() + ['user_id' => \Auth::user()->id] );
        $services = Service::all();
        $company = Company::find( $request->company_id );
        return view('frontend.pages.calendar', compact('company', 'services'));
    }
}
