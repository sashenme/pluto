<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);

        User::create([
            'first_name' => 'Default',
            'last_name' => 'Admin',
            'employee_id' => '0000',
            'email' => 'admin@pluto.lk',
            'password' => bcrypt('WishWell')
        ]);

        User::create([
            'first_name' => 'Default',
            'last_name' => 'User',
            'employee_id' => '0001',
            'email' => 'user@pluto.lk',
            'password' => bcrypt('password')
        ]);

        $user = User::find(1);
        $user->assignRole('admin');
        $user = User::find(2);
        $user->assignRole('user');
    }
}
