<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationships\BranchRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, BranchRelationship, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'phone',
        'city',
        'address',
        'opens',
        'closes'
    ];

}
