<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void{
        $permissions = [
            'view courses',
            'buy courses',
            'create courses',
            'edit courses',
            'delete courses',
            'view all courses',
            'enroll in courses',
            'manage enrollment',
            'view student details',
            'manage student details',
            'view instructors',
            'manage instructors',
            'view feedback',
            'manage feedback',
            'view reports',
            'generate reports',
            'manage payments',
            'view payments',
            'manage roles',
            'assign roles',
            'manage permissions',
            'view activity logs',
            'manage activity logs',
        ];
        foreach ($permissions as $permission) {Permission::create(['name' => $permission]);}
        $adminRole = Role::create(['name' => 'Admin']);
        $studentRole = Role::create(['name' => 'Student']);
        $adminRole->givePermissionTo(Permission::all());
        $studentPermissions = ['view courses', 'buy courses', 'enroll in courses',];
        foreach ($studentPermissions as $permission) {$studentRole->givePermissionTo($permission);}
        $Active = \App\Models\Status::create([
            'status_id' => '1',
            'type' => 'Active',
        ]);
        $deactive = \App\Models\Status::create([
            'status_id' => '2',
            'type' => 'Deactive',
        ]);
        $admin = \App\Models\User::create([
            'iocl_id' => 'AD0001',
            'firstName' => 'Admin',
            'lastName' => 'User',
            'email' => 'thamoddyarashmithadissanayake@gmail.com',
            'mobile_no' => '0711234567',
            'password' => Hash::make('1234'),
            'remember_token' => 'null',
            'profile_pic_path' => 'null',
            'login_attempt' => '0',
            'status_id' => '1',
        ]);
        $student = \App\Models\User::create([
            'iocl_id' => 'IOCL0001',
            'firstName' => 'Student',
            'lastName' => 'One',
            'email' => 'thamoddyarashmithadissanayake@gmail.com',
            'mobile_no' => '0769458554',
            'password' => Hash::make('1234'),
            'remember_token' => 'null',
            'profile_pic_path' => 'null',
            'login_attempt' => '0',
            'status_id' => '1',
        ]);
        $admin->assignRole('Admin');
        $student->assignRole('Student');
    }
}
