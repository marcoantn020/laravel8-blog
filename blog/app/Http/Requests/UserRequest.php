<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstName' => 'required|min:3',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ];
    }
}
