<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamCongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cham__congs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nhan_vien')->nullable();
            $table->datetime('ngay')->nullable();
            $table->time('gio_checkin')->nullable();
            $table->time('gio_checkout')->nullable();
            $table->string('so_gio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cham_congs');
    }
}
