<?php

namespace App\Http\Controllers;

use App\Models\PreSeller\PreSeller;
use App\Models\PreSellerSales\PreSellerSales;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {


        $preSellerData=[];
        $months=[1,2,3,4,5,6,7,8,9,10,11,12];
        $saleTypes=[PreSellerSales::HIZMET_TEDARIK,PreSellerSales::GENEL,PreSellerSales::GAYRIMENKUL];
        $preSellers=PreSeller::with(['preSellerTargets','mySales'])->get();

        foreach ($preSellers as $preSeller){

            foreach ($saleTypes as $saleType){
                $preSellerData[$preSeller->id][$saleType]=[];
                $monthlyTotal=0;
                foreach ($months as $month){
                    $typeCount=$preSeller->mySales()->where([['sale_type','=',$saleType],['month_number','=',$month]])->count();
                    array_push($preSellerData[$preSeller->id][$saleType],
                        array('montNumber'=>$month,'count'=>$typeCount,'type'=>$saleType,
                            'monthSalePrice'=>$preSeller->mySales()->where([['month_number','=',$month],['sale_type','=',$saleType]])->sum('sale_price'))
                    );
                    $monthlyTotal +=$typeCount;
                }
            }
        }


        foreach($preSellers as $preSeller){
            foreach ($months as $month){
                $preSellerData[$preSeller->id][$month-1]['total']=$this->monthTotalPriceEachPreSeller($preSeller,$saleTypes,$preSellerData,$month);
            }
        }

        $targets=PreSeller::with(['preSellerTargets'])->get();

        return view('welcome',compact('preSellerData','months','preSellers','targets','saleTypes'));

    }

    public function calculateSumByProcessType(PreSeller $preSeller,$type)
    {
        $sum=0;
        $sales=$preSeller->mySales()->where('sale_type',$type)->get();
        foreach ($sales as $sale){
            $sum +=$sale->sale_price;
        }
        return $sum;
    }

    public function calculateCountBySaleType(PreSeller $preSeller,$moth,$type)
    {
        return $preSeller->mySales()->where([['month_number','=',$moth],['sale_type','=',$type]])->count();
    }

    public function monthTotalPriceEachPreSeller(PreSeller $preSeller,$saleTypes,$preSellerData,$month)
    {
        $sum=0;
        foreach ($saleTypes as $saleType){
            $sum +=round($preSellerData[$preSeller->id][$saleType][$month-1]['monthSalePrice'],2);
        }
        return $sum;
    }
}
