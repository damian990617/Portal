<?php

namespace Modules\Portal\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Modules\Portal\Entities\Offer;

class OfferFavouriteController extends Controller
{
    public function index(Request $request)
    {
        $cookieData = json_decode(\Cookie::get('favourites')) ?? [];
        $items = Offer::visible()->whereIn('id', $cookieData)->paginate(5);

        return $this->view('portal.offers.favourites', [
            'items' => $items
        ]);
    }

    public function change(Request $request)
    {
        if (!$request->has('offer_id')) {
            return response()->json(
                [
                    'error' => 'Something went wrong'
                ]
            );
        }
        $cookieData = json_decode(\Cookie::get('favourites'));
        $exists = false;
        if (is_null($cookieData)) {
            $cookieData = [];
        }
        $offerId = $request->get('offer_id');
        $offer = Offer::visible()->where('id', $offerId)->first();
        if (!$offer) {
            return response()->json(
                [
                    'error' => 'Something went wrong'
                ]
            );
        }
        if (!in_array($offerId, $cookieData)) {
            $cookieData[] = $offer->id;
            $exists = true;
        } else {
            $key = array_search($offerId, $cookieData);
            unset($cookieData[$key]);
        }
        \Cookie::queue('favourites', json_encode($cookieData), 100000);
        return response()->json(
            [
                'status' => $exists,
                'total' => count($cookieData)
            ]
        );
    }

}
