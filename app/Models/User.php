<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tuition',
        'name',
        'email',
        'google_id',
        'google_avatar',
        'phone',
        'status',
        'type',
        'career_in_center_id',
    ];

    public function careerInCenter(): BelongsTo
    {
        return $this->belongsTo(CareerInCenters::class);
    }

    public function studentAssignment(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentAssignment::class);
    }
}
