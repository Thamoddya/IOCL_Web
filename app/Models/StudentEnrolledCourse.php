<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrolledCourse extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'student_enrolled_courses';

    protected $fillable = [
        'course_id',
        'user_id',
        'enrollment_date',
        'transaction_id',
        'completed',
        'status',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'transaction_id');
    }
}
