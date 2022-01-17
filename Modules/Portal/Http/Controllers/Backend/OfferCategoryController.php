<?php

namespace Modules\Portal\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\Controller as CoreController;
use Modules\Portal\Entities\OfferCategory;
use Modules\Portal\Forms\OfferCategoryForm;
use Bouncer;
use Modules\Portal\Http\Requests\Backend\OfferCategoryRequest;

class OfferCategoryController extends CoreController
{
    public function __construct()
    {
        $this->model = OfferCategory::class;
        $this->form = OfferCategoryForm::class;
        $this->baseView = 'panel.categories';
        $this->baseRoute = 'categories';
        $this->request = OfferCategoryRequest::class;
        $this->searchableColumns = [
            'name'
        ];
        parent::__construct();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!Bouncer::can('create', $this->model)) {
            return abort(403);
        }
        if (isset($this->request)) {
            $this->validateForm($request, new $this->request);
        }

        $item = $this->model::create($request->all());
        if ($request->hasFile('image')) {
            $item->attachMedia($request->file('image'));
        }
        return $this->redirect($this->routeWithModulePrefix . '.' . $this->defaultRedirect);
    }

    public function update(Request $request, $id)
    {
        if (!Bouncer::can('edit', $this->model)) {
            return abort(403);
        }
        if (isset($this->request)) {
            $this->validateForm($request, new $this->request, $id);
        }
        $item = $this->model::findOrFail($id);
        $item->fill($request->all())->save();

        if ($request->hasFile('image')) {
            if ($item->hasMedia()) {
                $item->detachMedia();
            }
            $item->attachMedia($request->file('image'));
        }

        return $this->redirect($this->routeWithModulePrefix . '.' . $this->defaultRedirect);
    }
}
