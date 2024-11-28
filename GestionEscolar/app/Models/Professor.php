<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function commissions()
    {
        return $this->belongsToMany(Commission::class, 'commission_professor');
    }
}
