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
        // $this->call(UsersTableSeeder::class);
        $vaults = factory(Mnemosine\Vault::class, 3)->create();
        $logins = factory(Mnemosine\Login::class, 10)->create();
        $notes = factory(Mnemosine\Note::class, 5)->create();
    }
}
