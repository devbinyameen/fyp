<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\ServiceArea;

class ServiceAreasComposer
{
    public $cityList = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */

    public function __construct()
    {
        $this->cityList = ServiceArea::whereStatus('active')->orderBy('city','asc')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('service_cities', $this->cityList);
    }
}