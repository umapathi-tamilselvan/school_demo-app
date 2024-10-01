<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $gaurded = [];

    protected $fillable = ['name', 'class', 'address', 'roll_no', 'contact', 'section', 'teacher_id', 'dob', 'blood_group'];

    public function teacher()
    {
        $this->belongsTo(Teacher::class);
    }
}
