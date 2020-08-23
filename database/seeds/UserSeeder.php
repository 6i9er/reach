<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        // must be 50k
        for ($i=0;$i<50000;$i++){
            $user = renamePersons(1,1);
            \App\Models\Member::add([
                "name" => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('123123'),
            ]);
        }


    }
}
