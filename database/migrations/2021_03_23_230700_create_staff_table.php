<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nhan_vien')->nullable();
            $table->string('ten_nhan_vien')->nullable();
            $table->string('anh')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('dia_chi_thuong_tru')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('sdt')->nullable();
            $table->string('email')->nullable();
            $table->string('quoc_tich')->nullable();
            $table->string('gioi_tinh')->nullable();
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
        Schema::dropIfExists('staff');
    }
}
