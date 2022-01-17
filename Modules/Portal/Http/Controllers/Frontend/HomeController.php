<?php

namespace Modules\Portal\Http\Controllers\Frontend;

use Modules\Portal\Entities\Offer;
use Modules\Portal\Entities\OfferCategory;

class HomeController extends Controller
{
    public function home()
    {
        $categories = OfferCategory::visible()->get();
        $promotedOffers = Offer::visible()->where('promoted', 1)->inRandomOrder()->take(3)->get();
        return $this->view('cms.pages.home', [
            'categories' => $categories,
            'promotedOffers' => $promotedOffers
        ]);
    }
}
