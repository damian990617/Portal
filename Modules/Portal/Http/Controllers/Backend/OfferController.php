<?php

namespace Modules\Portal\Http\Controllers\Backend;

use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Portal\Entities\Offer;
use Modules\Portal\Forms\OfferForm;
use Modules\Portal\Http\Requests\Backend\OfferRequest;

class OfferController extends CoreController
{
    public function __construct()
    {
        $this->model = Offer::class;
        $this->form = OfferForm::class;
        $this->baseView = 'panel.offers';
        $this->baseRoute = 'offers';
        $this->request = OfferRequest::class;
        $this->searchableColumns = [
            'name'
        ];
        parent::__construct();
    }
}
