<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_id', 'user_id', 'previous_status', 'status'
    ];

}
