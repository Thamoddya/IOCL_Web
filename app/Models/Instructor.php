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
        'img_path'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }

    public static function generateUniqueIoclId()
    {
        do {
            $ioclId = 'INS' . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        } while (self::where('iocl_id', $ioclId)->exists());

        return $ioclId;
    }
}
