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

    // Relación muchos a muchos con Commission
    public function commissions()
    {
        return $this->belongsToMany(Commission::class, 'commission_professor');
    }
}
