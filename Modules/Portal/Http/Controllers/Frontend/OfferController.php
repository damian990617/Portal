<?php

namespace Modules\Portal\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Modules\Portal\Entities\Offer;
use Modules\Portal\Entities\OfferCategory;
use Modules\Portal\Entities\OfferStat;
use Modules\Portal\Http\Requests\Frontend\OfferRequest;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $offers = Offer::where('user_id', auth()->id());
        if ($request->has('active')) {
            $status = $request->get('active');
            $offers = $offers->where('active', $status);
        }

        $offers = $offers->paginate(5);
        return $this->view('cms.profile.offers', [
            'items' => $offers
        ]);
    }

    public function search(Request $request)
    {
        $items = Offer::searchable()->paginate(15);
        return $this->view('portal.offers.search', [
            'items' => $items
        ]);
    }

    public function show($slug)
    {
        $item = Offer::visible()->where('slug->en', $slug)->first();
        if (!$item) {
            abort(404);
        }
        $author = $item->user;

        $stat = $item->stat;
        if (!$stat) {
            $stat = OfferStat::create(['offer_id' => $item->id, 'visitor_count' => 1]);
        } else {
            $stat->increment('visitor_count');
        }
        return $this->view('portal.offers.show', [
            'item' => $item,
            'author' => $author
        ]);
    }

    public function edit($id)
    {
        $item = Offer::where('id', $id)->first();
        if (!$item) {
            abort(404);
        }
        $categories = OfferCategory::all();
        return $this->view('portal.offers.edit', [
            'item' => $item,
            'categories' => $categories
        ]);
    }

    public function update($id, OfferRequest $request)
    {
        $user = auth()->user();
        $item = Offer::where('id', $id)->where('user_id', $user->id)->first();
        if (!$item) {
            return abort(404);
        }
        if ($request->hasFile('image')) {
            if ($item->hasMedia()) {
                $item->detachMedia();
            }
            $item->attachMedia($request->file('image'));
        }
        $data = $request->all();
        if (isset($data['negotiate'])) {
            $data['negotiate'] = $data['negotiate'] == 'on';
        } else {
            $data['negotiate'] = 0;
        }
        $item->update($data);

        return redirect()->back()->with('success', 'Offer has been updated!');
    }

    public function create()
    {
        $categories = OfferCategory::all();
        return $this->view('portal.offers.create', [
            'categories' => $categories
        ]);
    }

    public function store(OfferRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $item = Offer::create($data);
        if ($request->hasFile('image')) {
            $item->attachMedia($request->file('image'));
        }

        return redirect(route('Front::portal.profile.offers.edit', ['id' => $item->id]))->with(
            'success',
            'Offer has been added to verification. Please wait'
        );
    }
}
