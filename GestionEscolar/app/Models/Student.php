<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Especificar la tabla
    protected $table = 'students';

    protected $fillable = [
        'nombre',
        'email',
    ];



    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_students')
                ->withPivot('commission_id')
                ->withTimestamps();
    }
}
