<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'branch_id' => '1',
            'name' => 'md.admin',
            'email' => 'admin@blog.com',
            'phone' => '01711023145',
            'password' => bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'branch_id' => '1',
            'name' => 'md.author',
            'email' => 'author@blog.com',
            'phone' => '01711023146',
            'password' => bcrypt('rootadmin'),
        ]);
    }
}
