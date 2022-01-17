<?php

namespace Modules\Portal\Http\Controllers\Frontend;

use Modules\Cms\Entities\CmsUser;
use Modules\Portal\Entities\Offer;

class ProfileController extends Controller
{
    public function show($username, CmsUser $item)
    {
        $item = $item->where('username', $username)->first();
        if (!$item) {
            abort(404);
        }
            $offers = Offer::visible()->where('user_id', $item->id)->paginate(3);

        return $this->view('cms.profile.show', [
            'item' => $item,
            'offers' => $offers
        ]);
    }
}
