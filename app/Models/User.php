<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'iocl_id',
        'firstName',
        'lastName',
        'email',
        'mobile_no',
        'password',
        'remember_token',
        'password_reset_code',
        'profile_pic_path',
        'login_attempt',
        'status_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }

    public static function generateUniqueIoclId()
    {
        do {
            $ioclId = 'IOCL' . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        } while (self::where('iocl_id', $ioclId)->exists());

        return $ioclId;
    }
}
