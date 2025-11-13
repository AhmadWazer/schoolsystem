<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Subjent;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        's_name',
        's_code',
        's_discription',
        'assign_teacher'
    ];

//   public function teacher()
// {
//     return $this->belongsTo(User::class, 'assign_teacher');
// }
// Attendance
 public function teacher()
    {
        return $this->belongsTo(User::class, 'assign_teacher');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
