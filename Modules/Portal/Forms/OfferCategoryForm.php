<?php

namespace Modules\Portal\Forms;

use Modules\Core\src\FormBuilder\Form;

class OfferCategoryForm extends Form
{
    public function buildForm()
    {
        $this->add('name');

        $this->add('short_content', 'textarea');
        $this->add('content', 'textarea');

        $this->add('image', 'file');

        $this->add('active', 'checkbox');
    }
}
