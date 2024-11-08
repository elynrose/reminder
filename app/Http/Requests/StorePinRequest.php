<?php

namespace App\Http\Requests;

use App\Models\Pin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePinRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pin_create');
    }

    public function rules()
    {
        return [
            'location_id' => [
                'required',
                'integer',
            ],
            'reminder_id' => [
                'required',
                'integer',
            ],
            'lng' => [
                'numeric',
            ],
            'lat' => [
                'numeric',
            ],
            'photo' => [
                'required',
            ],
        ];
    }
}
