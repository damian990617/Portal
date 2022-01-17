<?php

namespace Modules\Portal\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Modules\Portal\Entities\Offer;
use Modules\Portal\Entities\OfferCategory;

class OfferCategoryController extends Controller
{
    /**
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug): \Illuminate\Http\Response
    {
        $item = OfferCategory::where('slug->en', $slug)->first();
        if (!$item) {
            abort(404);
        }
        $offers = $item->offers()->visible()->paginate();

        return $this->view('portal.categories.show', [
            'item' => $item,
            'offers' => $offers
        ]);
    }
}
