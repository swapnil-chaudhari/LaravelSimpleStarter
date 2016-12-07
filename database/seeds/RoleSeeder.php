<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            $role = Role::create([
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Administrator of the system.'
            ]);

            User::first()->attachRole($role);
        });
    }
}
