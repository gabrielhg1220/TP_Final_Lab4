<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'nombre',
        'subject_id',
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students')
                ->withPivot('commission_id')
                ->withTimestamps();

    }
}
