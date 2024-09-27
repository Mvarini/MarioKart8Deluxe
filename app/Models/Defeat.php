<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Defeat extends Model
{
    use HasFactory;

    protected $table = 'defeats';

    protected $fillable = [
        'user_id',
        'harmed',
        'pain',
        'date_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
