<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo( Service::class );
    }

    public function customer()
    {
        return $this->belongsTo( User::class, 'user_id' );
    }

}
