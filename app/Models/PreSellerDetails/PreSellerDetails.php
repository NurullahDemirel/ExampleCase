<?php

namespace App\Models\PreSellerDetails;

use App\Models\PreSeller\PreSeller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreSellerDetails extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table ='pre_seller_targets';

    public function preSeller(): BelongsTo
    {
        return $this->belongsTo(PreSeller::class,'pre_seller_id','id');
    }

}
