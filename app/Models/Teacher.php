<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Standard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['name','email'];




    public function student(){
        $this->hasMany(Student::class);
    }
}
