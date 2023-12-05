<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    protected $primaryKey = "admin_id";
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    public function nurses()
    {
        return $this->hasMany(Nurse::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
