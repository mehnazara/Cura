<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $table = "nurses";
    protected $primaryKey = "nurse_id";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'qualifications',
        'gender',
        'age',
        'photo',
        'nursing_types',
    ];
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_nurse', 'nurse_id', 'patient_id');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'nurse_service', 'nurse_id', 'service_id');
    }
}
