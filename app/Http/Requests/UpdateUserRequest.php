<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'surname' => 'required',
            'community' => 'required|not_in:0',
            'province' => 'required|not_in:0',
            'cp' => 'required|max:5',
            'tlfNumber' => 'required|max:9',
        ];
    }
}
