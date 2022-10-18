<?php 

namespace App\Models\Traits\Relationships;

use App\Domains\Auth\Models\User;
use App\Models\Branch;

trait CompanyRelationship
{

    public function owner()
    {
        return $this->belongsTo( User::class );
    }

    public function branches()
    {
        return $this->hasMany( Branch::class );
    }

}