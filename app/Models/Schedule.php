<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'group_id',
        'user_id',
        'note',
        'start_time',
        'end_time'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

     /**
     * fillable
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
