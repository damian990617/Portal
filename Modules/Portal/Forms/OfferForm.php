<?php

namespace Modules\Portal\Forms;

use Modules\Core\src\FormBuilder\Form;
use Modules\Portal\Entities\OfferCategory;

class OfferForm extends Form
{
    public function buildForm()
    {
        $this->add('name');
        $this->add('price');
        $this->add('negotiate', 'checkbox');
        $this->add('promoted', 'checkbox');

        $categories = OfferCategory::all();
        $categories_data = [];
        foreach ($categories as $category) {
            $categories_data[$category->id] = $category->name;
        }
//        dd($categories_data);
        $this->add('category_id', 'select', [
            'choices' => $categories_data
        ]);

        $this->add('short_content', 'textarea');
        $this->add('content', 'textarea');

        $this->add('active', 'checkbox');
    }
}
