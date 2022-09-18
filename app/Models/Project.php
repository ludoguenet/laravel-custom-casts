<?php

namespace App\Models;

use App\Casts\Project\BusinessDaysCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'deadline_at',
      'business_days',
      'user_id'
    ];

    protected $casts = [
        'deadline_at' => 'date',
        'business_days' => BusinessDaysCast::class,
    ];

    /**
     * @return BelongsTo<User, Project>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
