<?php

use App\Http\Controllers\ProcessController;
use App\Models\PreSeller\PreSeller;
use App\Models\PreSellerSales\PreSellerSales;
use Illuminate\Support\Facades\Route;
use Faker\Generator as Faker;

Route::get('', [ProcessController::class,'index']);
