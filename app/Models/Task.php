<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS_PENDING = 0;
    const STATUS_COMPLETED = 1;

    public function getStatusLabelAttribute()
    {
        return $this->status == self::STATUS_PENDING ? 'pending' : 'completed';
    }
}
