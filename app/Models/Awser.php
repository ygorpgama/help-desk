<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Awser extends Model
{
    use HasFactory;

    public function task(): BelongsTo{
        return $this->belongsTo(Task::class);
    }
}
