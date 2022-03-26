<?php

namespace App\Console\Commands;

use App\Models\PreSeller\PreSeller;
use App\Models\PreSellerSales\PreSellerSales;
use Illuminate\Console\Command;
use Faker\Generator as Faker;

class CreateDummyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:dummy-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command create dummy data for process';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Faker $generator)
    {
//        create  random number(PreSeller count)
    $preSellerCount = rand(3, 4);

    //create PreSeller Model

    PreSeller::factory()->count($preSellerCount)->create();

    //define monthly_target for each PreSeller and each month 1-10
    $preSellers = PreSeller::all();
    $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    foreach ($preSellers as $preSeller) {
        foreach ($months as $month) {
            $preSeller->preSellerTargets()->create([
                'monthly_target' => rand(100000,1000000),
                'month_number' => $month
            ]);
        }
    }

    //create random sales for each PreSeller (max 100 sales)
    $saleTypes = [PreSellerSales::HIZMET_TEDARIK, PreSellerSales::GENEL, PreSellerSales::GAYRIMENKUL];

    foreach ($preSellers as $preSeller) {
        foreach (range(1, rand(2, 100)) as $number) {
            $preSeller->mySales()->create([
                'sale_type' => $saleTypes[rand(0, 2)],
                'month_number' => $months[rand(0, 11)],
                'product_name' => $generator->name,
                'sale_price' => rand(1000, 100000) / 10
            ]);
        }
    }
    }
}
