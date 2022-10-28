<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $name
 * @property mixed $number
 * @property mixed $year
 */
class Semester extends Model
{
    use HasFactory;
    protected $guarded = [];
}
