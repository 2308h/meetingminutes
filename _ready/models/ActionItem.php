<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionItem extends Model
{
    use HasFactory;

    /**
     * Mass-assignable fields.
     */
    protected $fillable = [
        'meeting_minute_id',
        'task',
        'responsible_person',
        'deadline',
        'status',
    ];

    /**
     * Cast deadline to a date.
     */
    protected $casts = [
        'deadline' => 'date',
    ];

    // ─── Relationships ──────────────────────────────────────────────

    /**
     * An action item belongs to a meeting minute.
     */
    public function meetingMinute()
    {
        return $this->belongsTo(MeetingMinute::class);
    }
}
