<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commission extends Model
{
    use HasFactory;

    protected $table = 'commissions';

    protected $fillable = [
        'aula',
        'horario',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function commission()
    {
        return $this->hasMany(Commission::class);
    }

    public function professors()
    {
        return $this->belongsTo(Professor::class, 'commission_professor', 'commission_id', 'professor_id');
    }

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class);
    }
}
