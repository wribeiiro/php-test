<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $table = "lectures";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'date',
        'event_id',
        'start_time',
        'end_time',
        'description',
        'speaker_id'
    ];

    public function event() {
        return $this->belongsTo(Event::class, 'event_id', 'id')->select(array('id', 'title'));
    }

    public function speaker() {
        return $this->belongsTo(Speaker::class, 'speaker_id', 'id')->select(array('id', 'name'));
    }
}
