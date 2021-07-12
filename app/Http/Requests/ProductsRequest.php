<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','string','min:5'],
            'value' => ['string'],

            'type_products_id' => ['required'],
            'category_products_id' => ['required'],
            'location_products_id' => ['required'],

            'room'=> ['integer'],
            'suite'=> ['integer'],
            'restroom'=> ['integer'],
            'vacany'=> ['integer'],
            'walk'=> ['integer'],

            // 'about' => ['string','min:5'],

            'estado' => ['required'],
            'cidade' => ['required'],
            
            'file' => ['mimes:png,jpg','max:300', $this->method() != 'PUT' ? 'required' : '']
        ];
    }
}
