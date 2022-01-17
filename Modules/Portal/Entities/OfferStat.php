<?php

namespace Modules\Portal\Entities;

use Illuminate\Database\Eloquent\Model;

class OfferStat extends Model
{

    protected $fillable = [
        'offer_id',
        'visitor_count'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function offer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

}
