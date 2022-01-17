<?php

namespace Modules\Portal\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class OfferRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $routeName = \Request::route()->getName();
        $isUpdate = Str::contains($routeName, 'offers.update');
        return [
            'name' => 'required|min:3|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'short_content' => 'required|min:3|max:255',
            'image' => !$isUpdate ? 'required' : ''
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
