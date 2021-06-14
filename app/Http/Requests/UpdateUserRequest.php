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
            'community_id' => 'required',
            'province_id' => 'required',
            'cp' => 'required|min:5|max:5',
            'tlfNumber' => 'required|min:9|max:9',
        ];
    }

    public function attributes()
    {
        return [
            'username' => __('global.username'),
            'email' => __('global.email'),
            'name' => __('global.name'),
            'surname' => __('global.surname'),
            'community_id' => __('global.community'),
            'province_id' => __('global.province'),
            'cp' => __('global.cp'),
            'tlfNumber' => __('global.tlfNumber')
        ];
    }
}
