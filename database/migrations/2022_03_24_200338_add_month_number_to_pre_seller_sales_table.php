<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMonthNumberToPreSellerSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_seller_sales', function (Blueprint $table) {
            $table->enum('month_number',[1,2,3,4,5,6,7,8,9,10,11,12]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pre_seller_sales', function (Blueprint $table) {
            //
        });
    }
}
