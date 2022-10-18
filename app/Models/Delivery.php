<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'branch_id',
        'service_id',
        'sender_phone',
        'sender_city',
        'sender_address',
        'delievery_boy',
        'destination',
        'reciever',
        'reciever_phone',
        'reciever_city',
        'weight',
        'payment_method',
        'cod_amount',
        'delivery_charges',
        'total_charges',
        'status',
        'booking_date'
    ];

    public function branch()
    {
        return $this->belongsTo( Branch::class );
    }

    public function rider()
    {
        return $this->belongsTo( User::class, 'rider_id' );
    }

    public function service()
    {
        return $this->belongsTo( Service::class );
    }

}
