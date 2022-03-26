<?php

use App\Models\PreSellerSales\PreSellerSales;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreSellerSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_seller_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pre_seller_id')->constrained('pre_sellers');
            $table->enum('sale_type',[PreSellerSales::GAYRIMENKUL,PreSellerSales::HIZMET_TEDARIK,PreSellerSales::GENEL]);
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
        Schema::dropIfExists('pre_seller_sales');
    }
}
