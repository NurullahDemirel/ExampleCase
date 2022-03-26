<?php

namespace App\Models\PreSeller;

use App\Models\PreSellerDetails\PreSellerDetails;
use App\Models\PreSellerSales\PreSellerSales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PreSeller extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function preSellerTargets(): HasMany
    {
        return $this->hasMany(PreSellerDetails::class,'pre_seller_id','id');
    }

    public function mySales(): HasMany
    {
        return $this->hasMany(PreSellerSales::class,'pre_seller_id','id');
    }
}
