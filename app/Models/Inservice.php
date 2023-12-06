<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inservice extends Model
{
    use HasFactory;
    protected $table = "inservices";
    protected $primaryKey = "service_id";
    protected $fillable = [
        'patient_id',
        'nurse_id',
        'service_type',
        'service_start',
        'service_end',
        'amount',
        'status',
        'payment_method'
    ];

    
    public function getKeyName() {
        return 'service_id';
    }
}
