<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['student_id', 'group_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    /**
     * fillable
     *
     * @var array
     */
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
