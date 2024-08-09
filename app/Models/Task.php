<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "technician_id",
        "cause_id" ,
        "image_link" ,
        "status",
        "description"
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technician(): BelongsTo{
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function awser(): HasOne{
        return $this->hasOne(Awser::class);
    }

    public function cause(): BelongsTo {
        return $this->belongsTo(Cause::class);
    }
}

