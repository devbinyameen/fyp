<?php 

namespace App\Models\Traits\Relationships;

use App\Domains\Auth\Models\User;

trait CompanyRelationship
{

    public function owner()
    {
        return $this->belongsTo( User::class );
    }


}