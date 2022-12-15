<?php

namespace App\Http\Requests;

use App\Rules\Ilike;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'             => [
                'required', 'string', 'max:100',
                //new Ilike('stores', 'name', $this->id)
            ],
            'type_delivery_id' => 'required|integer',
            'direction'        => 'required|string'
        ];
    }
}
