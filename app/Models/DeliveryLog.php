<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryLog extends Model
{
    use HasFactory;

    protected $cast = [
        'data' => 'object',
    ];

    protected $fillable = [
        'delivery_id', 'user_id', 'log_type', 'data',
    ];
}
