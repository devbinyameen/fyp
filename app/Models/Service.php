<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationships\ServiceRelationship;

class Service extends Model
{
    use HasFactory,ServiceRelationship;

    protected $guarded = [ ];


}
