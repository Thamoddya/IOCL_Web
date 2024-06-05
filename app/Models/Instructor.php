<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';

    protected $primaryKey = 'instructor_id';

    protected $fillable = [
        'iocl_id',
        'lecturers',
        'name',
        'bio',
        'nic',
        'mobile',
        'email',
        'status_id',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }
}
