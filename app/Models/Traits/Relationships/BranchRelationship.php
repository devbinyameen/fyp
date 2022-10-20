<?php 

namespace App\Models\Traits\Relationships;

use App\Models\Company;
use App\Models\Delivery;

trait BranchRelationship
{

    public function company()
    {
        return $this->belongsTo( Company::class );
    }

    public function deliveries()
    {
        return $this->hasMany( Delivery::class );
    }

}