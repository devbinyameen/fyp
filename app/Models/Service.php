<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationships\ServiceRelationship;

class Service extends Model
{
    use HasFactory,ServiceRelationship;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'service_level',
        'charges',
        'status',
        'service_title',
    ];


}
