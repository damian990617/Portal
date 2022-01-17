<?php

namespace Modules\Portal\Observers;

use Modules\Portal\Entities\Offer;

class OfferObserver
{

    /**
     * Handle the User "updated" event.
     *
     * @param Offer $offer
     * @return void
     */
    public function updating(Offer $offer)
    {
        if (request()->get('active') == 1) {
            $offer->accepted_by = auth()->id();
            $offer->accepted_at = now();
        }
    }

}
