<?php

use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        must be 1M

        for ($i=0;$i<1000000;$i++){
            $month = rand(1,12);
            $day = rand(1,28);
            $user = renamePersons(1,1);
            \App\Models\UserVisit::add([
                "user_id" => rand(1,50000),
                'visit_date' => rand(2018,2020).'-'.((strlen($month) > 1 ) ? $month :  "0".$month).'-'.((strlen($day) > 1 ) ? $day :  "0".$day),
            ]);
        }
    }
}
