<?php

namespace App\Models\PreSellerSales;

use App\Models\PreSeller\PreSeller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreSellerSales extends Model
{
    use HasFactory;
    public const GAYRIMENKUL = 'Gayrimenkul';
    public const HIZMET_TEDARIK='Hizmet Tedarik';
    public const GENEL ='Genel';
    protected $guarded=[];

    public function preSeller(): BelongsTo
    {
        return $this->belongsTo(PreSeller::class,'pre_seller_id','id');
    }

}
