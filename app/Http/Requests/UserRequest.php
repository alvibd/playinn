<?php

namespace App\Http\Requests;


use App\AppConstants;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|max:20|string',
            'email' => 'required|email|unique:users',
            'gender' => [
                'required',
                Rule::in(AppConstants::GENDER),
                'string'
            ],
            'city' => 'required|string|max:20',
            'football_level' => [
                'required',
                'string',
                'alpha',
                'max:15',
                Rule::in(AppConstants::GAME_LEVEL)
            ],
            'soccer_level' => [
                'required',
                'string',
                'alpha',
                'max:15',
                Rule::in(AppConstants::GAME_LEVEL)
            ],
            'basketball_level' => [
                'required',
                'string',
                'alpha',
                'max:15',
                Rule::in(AppConstants::GAME_LEVEL)
            ],
            'password' => 'required|string'
        ];
    }
}
