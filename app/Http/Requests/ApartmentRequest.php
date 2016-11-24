<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'name' => 'required|max:255',
            'cover_image' => 'image|max:1000' . $this->method() === 'POST' ? '|required' : '',
            'address' => 'required|max:255',
            'district' => 'required|max:255',
            'price' => 'required|numeric',
            'bedroom_total' => 'required|numeric',
            'unit_total' => 'required|numeric',
            'maintenance_fee' => 'required|numeric',
            'facilities' => 'required|array',
        ];
    }
}
