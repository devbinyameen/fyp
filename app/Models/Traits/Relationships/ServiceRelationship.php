<?php 

namespace App\Models\Traits\Relationships;

use App\Models\Company;

trait ServiceRelationship
{

    public function company(  )
    {
        return $this->belongs_to( Company::class );
    }


}