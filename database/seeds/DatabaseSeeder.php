<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(VaultsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);

        // TODO: remover as linhas do factory antes de passar pra production
//        factory(Mnemosine\Vault::class, 3)->create();
//        factory(Mnemosine\Login::class, 10)->create();
//        factory(Mnemosine\Note::class, 5)->create();
    }
}
