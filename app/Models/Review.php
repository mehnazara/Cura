<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    protected $primaryKey = "nurse_id";
    protected $fillable = [
        'nurse_id',
        'comments',
        'rating',
    ];
}
