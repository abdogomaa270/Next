<?php

namespace App\Http\Requests;


class SignUpRequest extends ApiRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'required|string|unique:users|max:150',
            'name'=>'required|string|min:3|max:50',
            'password'=>'required|string|min:8|max:30'
        ];
    }
}
