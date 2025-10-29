<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['SuperAdmin', 'SchoolAdmin', 'Teacher', 'Student', 'Parent','Bursar'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }


        // Create a default SuperAdmin user
        $super = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // change after initial login
            ]
        );
        $super->assignRole('SuperAdmin');


        $schoolAdmin = User::firstOrCreate(
            ['email' => 'schooladmin@gmail.com'],
            [
                'name' => 'School Admin',
                'password' => Hash::make('password'),
            ]
        );
        $schoolAdmin->assignRole('SchoolAdmin');

        $teacher = User::firstOrCreate(
            ['email' => 'teacher@gmail.com'],
            [
                'name' => 'Teacher',
                'password' => Hash::make('password'),
            ]
        );
        $teacher->assignRole('Teacher');




        $student = User::firstOrCreate(
            ['email' => 'student@gmail.com'],
            [
                'name' => 'Student',
                'password' => Hash::make('password'),
            ]
        );
        $student->assignRole('Student');





                $bursar = User::firstOrCreate(['email' => 'bursar@gmail.com'], ['name'=>'Bursar','password'=>Hash::make('password')]);
        $bursar->assignRole('Bursar');




        $parent = User::firstOrCreate(['email' => 'parent@gmail.com'], ['name'=>'Parent','password'=>Hash::make('password')]);
        $parent->assignRole('Parent');



    }
}
