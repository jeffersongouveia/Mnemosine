<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Administrador', 'Escrita', 'Leitura'];
        $deleted = false;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        foreach($names as $id => $name) {
            DB::table('groups')->insert([
                'id' => $id + 1,
                'name' => $name,
                'deleted' => $deleted,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ]);
        }
    }
}
