<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenttype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $now = date('Y-m-d H:i:s');

        DB::table('content_types')->insert(
            array(
                array('name' => 'Sommario', 'created_at' => $now, 'updated_at' => $now),
                array('name' => 'Posta', 'created_at' => $now, 'updated_at' => $now),
                array('name' => 'Top secret', 'created_at' => $now, 'updated_at' => $now),
                array('name' => 'Coin-op', 'created_at' => $now, 'updated_at' => $now)
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_types');
    }
}
