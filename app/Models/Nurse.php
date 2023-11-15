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
        'qualifications',
        'gender',
        'age',
        'photo'
    ];
    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }
}
