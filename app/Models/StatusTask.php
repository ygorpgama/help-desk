<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusTask extends Model
{
    use HasFactory;

    public function taks() : HasMany{
        return $this->hasMany(Task::class);
    }
}
