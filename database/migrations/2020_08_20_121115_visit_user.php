<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisitUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('visit_date');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => VisitSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visit_user');
    }
}
