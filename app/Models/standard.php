<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class standard extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function teacher()
    {
        $this ->hasMany(Teacher::class);
    }
    public function student(){
        $this ->hasMany(Student::class);
    }
}


