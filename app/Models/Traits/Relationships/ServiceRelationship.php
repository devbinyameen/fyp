<?php 

namespace App\Models\Traits\Relationships;

use App\Models\Service;

trait ServiceRelationship
{

    public function children(  )
    {
        return $this->hasMany( Service::class, 'parent_id' )->with('children');
    }

    public function parent()
    {
        return $this->belongsTo( Service::class, 'parent_id' );
    }


}