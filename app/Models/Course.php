<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_no',
        'student_count',
        'title',
        'description',
        'price',
        'total_price',
        'expire_date',
        'status_id',
        'instructor_id',
        'category_id',
        'image_path'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'instructor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    //get  course Videos related to this course
    public function videos()
    {
        return $this->hasMany(CourseVideo::class, 'course_id', 'course_id');
    }
    //Get Count Of Enrolled Students for this course
    public function students()
    {
        return $this->belongsToMany(User::class, 'student_enrolled_courses', 'course_id', 'user_id');
    }
    //Get Course Material Count
    public function courseMaterial()
    {
        return $this->hasMany(CourseMaterial::class, 'course_id', 'course_id');
    }
    //get course total earned price from transactions
    public function totalEarned()
    {
        return $this->hasMany(Transaction::class, 'course_id', 'course_id');
    }

    /**
     * @param int|null $userId
     * @return bool
     */
    public function isEnrolledByUser($userId = null)
    {
        if (is_null($userId)) {
            $userId = Auth::id();
        }

        return $this->enrollments()->where('user_id', $userId)->exists();
    }

    public function enrollments()
    {
        return $this->hasMany(StudentEnrolledCourse::class, 'course_id', 'course_id');
    }
}
