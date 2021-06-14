<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnnounceRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'type' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => __('global.title'),
            'description' => __('global.description'),
            'gender' => __('global.gender'),
            'type' => __('global.type')
        ];
    }
}
