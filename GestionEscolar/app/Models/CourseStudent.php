<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseStudent extends Model
{
    use HasFactory;

    protected $table = 'course_students';

    protected $fillable = [
        'student_id',
        'curse_id',
        'commission_id',
    ];

    // Relaciones
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class);
    }
}
