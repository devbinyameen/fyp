<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationships\CompanyRelationship;

class Company extends Model
{
    use HasFactory,
        CompanyRelationship;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'NTN'
    ];

}
