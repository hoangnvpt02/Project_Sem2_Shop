<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('price');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->tinyInteger('status')->Default(0);
            $table->integer('product_id');
            $table->string('created_by')->Default(null);
            $table->string('updated_by')->Default(null);
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
        Schema::dropIfExists('discounts_codes');
    }
}
