<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhone extends FormRequest
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
            'number' => 'required|string|max:25',
            'primary' => 'boolean',
            'model' => 'required|string|max:25',
            'company' => 'required|string|max:25',
            'os' => 'required|string|max:25',
            'os_version' => 'required|string|max:25'
        ];
    }
}
