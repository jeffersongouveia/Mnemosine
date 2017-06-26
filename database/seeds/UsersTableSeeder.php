<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deleted = false;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        DB::table('users')->insert([
            'id' => 1,
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'deleted' => $deleted,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]);

        DB::table('user_groups')->insert([
            'id_user' => 1,
            'id_group' => 1,
            'deleted' => $deleted,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]);
    }
}
