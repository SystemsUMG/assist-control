<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Center extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function careerInCenters(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CareerInCenters::class);
    }
}
