<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionMethod extends Model
{
    use HasFactory;


    protected $table = 'transaction_methods';

    protected $primaryKey = 'payment_method_id';

    protected $fillable = [
        'type',
    ];
}
