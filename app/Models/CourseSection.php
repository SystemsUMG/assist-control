<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

/**
 * @property mixed $studentAssignment
 */
class CourseSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function careerInCenter(): belongsTo
    {
        return $this->belongsTo(CareerInCenters::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): belongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function semester(): belongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function studentAssignment(): HasMany
    {
        return $this->hasMany(StudentAssignment::class);
    }
}
