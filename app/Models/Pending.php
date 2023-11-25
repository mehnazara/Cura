<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
    use HasFactory;
    protected $table = "pending_payment";
    protected $primaryKey = "payment_id";
    protected $fillable = [
        'patient_id',
        'nurse_id',
        'service_type',
        'service_start',
        'service_end',
        'amount',
        'payment_status'
    ];
}
