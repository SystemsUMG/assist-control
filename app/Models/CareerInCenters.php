<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $center
 * @property mixed $career
 * @property int|mixed $career_code
 * @property mixed $center_id
 * @property int|mixed $career_id
 * @method static find($id)
 */
class CareerInCenters extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }

    public function center(): BelongsTo
    {
        return $this->belongsTo(Center::class);
    }
}
