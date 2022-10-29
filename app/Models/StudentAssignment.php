<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

/**
 * @method static get()
 */
class StudentAssignment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function courseSection(): BelongsTo
    {
        return $this->belongsTo(CourseSection::class);
    }

    public function assistances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Assistance::class);
    }
}
