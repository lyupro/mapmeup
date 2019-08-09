<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocation extends FormRequest
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
            'user_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'latitude' => 'required|string|max:50',
            'longitude' => 'required|string|max:50',
            'type' => 'required|string|max:25',
        ];
    }
}
