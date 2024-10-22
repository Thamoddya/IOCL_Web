<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;

    protected $table = 'payment_statuses';

    protected $primaryKey = 'payment_status_id';

    protected $fillable = [
        'type',
    ];
}
