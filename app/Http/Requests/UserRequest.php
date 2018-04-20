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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nip'       => 'required|numeric',
          'email'     => 'required|email',
          'name'      => 'required|max:255',
          'gender'    => 'required',
          'username'  => 'required|min:5|max:20|alpha_num',
          'password'  => 'required|min:8',
        ];
    }
}
