<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingMinute extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'meeting_minutes';

    /**
     * Mass-assignable fields (all columns except id and timestamps).
     */
    protected $fillable = [
        'user_id',
        'title',
        'meeting_date',
        'meeting_time',
        'location',
        'chairperson',
        'secretary',
        'attendees',
        'agenda',
        'discussion',
        'decisions',
        'status',
    ];

    /**
     * Cast date/time columns to native types.
     */
    protected $casts = [
        'meeting_date' => 'date',
    ];

    // ─── Relationships ──────────────────────────────────────────────

    /**
     * A meeting minute belongs to the user who created it.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A meeting minute has many action items.
     */
    public function actionItems()
    {
        return $this->hasMany(ActionItem::class);
    }
}
