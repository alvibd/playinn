<?php

namespace App\Http\Requests;

use App\AppConstants;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LobbyRequest extends FormRequest
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
            'type' => [
                'required',
                'string',
                'max:15',
                'alpha',
                Rule::in(AppConstants::GAME)
            ],
            'gender' => 'required|max:15|string|alpha',
            'privacy' => 'required|boolean',
            'start_time' => 'required|date|after:'.Carbon::now(),
            'end_time' => 'required|date|after:'.$this->request->get('start_time'),
            'capacity' => 'required|integer',
            'created_by' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id'
        ];
    }
}
