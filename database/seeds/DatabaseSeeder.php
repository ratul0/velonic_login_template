<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $tables = [
            'users',
            'roles',
            'role_user',
            'permissions',
            'permission_role',
            'password_resets',
            'cashiers'
        ];



            DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        $this->command->info('...Truncating Tables...');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
            $this->command->info($table.' truncated...');
        }

        $this->command->info('...All Tables Truncated Successfully...');

        $this->command->info('...Seeding Initiated...');

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EntrustTableSeeder::class);


            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->command->info('...Seeding Done...');

        Model::reguard();
    }
}
