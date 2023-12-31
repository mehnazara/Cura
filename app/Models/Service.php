<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $primaryKey = "service_id";
    protected $fillable = [
        'name',
        'description',
        'duration',
        'cost',
        'associated_nurses',
        'image'
    ];

    public function nurses()
    {
        return $this->hasMany(Nurse::class);
    }
}
