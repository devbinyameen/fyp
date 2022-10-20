<?php 

namespace App\Models\Traits\Relationships;

use App\Domains\Auth\Models\User;
use App\Models\Category;
use App\Models\Service;

trait CompanyRelationship
{

    public function owner()
    {
        return $this->belongsTo( User::class );
    }

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

    public function services()
    {
        return $this->hasMany( Service::class );
    }


}