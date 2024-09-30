<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\Standard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $gaurded=[];
    protected $fillable = ['name','class','address','roll_no','contact','section','teacher_id'];

    public function teacher(){
        $this->belongsTo(Teacher::class);
    }
}
