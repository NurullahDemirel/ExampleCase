<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreSellerTargets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_seller_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pre_seller_id')->constrained('pre_sellers');
            $table->enum('month_number',[1,2,3,4,5,6,7,8,9,10,11,12]);
            $table->integer('monthly_target');
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
        Schema::dropIfExists('pre_seller_targets');
    }
}


