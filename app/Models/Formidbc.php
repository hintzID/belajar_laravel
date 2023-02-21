<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formidbc extends Model
{
    protected $fillable = [
        'member_id', 'presence', 'note'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function getStudentNameAttribute()
    {
        return $this->member->student->name;
    }

    public function getGroupNameAttribute()
    {
        return $this->member->group->name;
    }
}