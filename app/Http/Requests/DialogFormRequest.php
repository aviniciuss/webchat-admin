<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DialogFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_name'    => 'required|string',
            'client_channel' => 'required|string',
        ];
    }
}
