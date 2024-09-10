<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrtuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dname'    => 'sometimes|required',
            'djob'     => 'sometimes|required',
            'ddegree'  => 'sometimes|required',
            'dphone'   => 'sometimes|required',
            'daddress' => 'sometimes|required',

            'mname'    => 'sometimes|required',
            'mjob'     => 'sometimes|required',
            'mdegree'  => 'sometimes|required',
            'mphone'   => 'sometimes|required',
            'maddress' => 'sometimes|required',

            'wname'    => 'sometimes|required',
            'wjob'     => 'sometimes|required',
            'wdegree'  => 'sometimes|required',
            'wphone'   => 'sometimes|required',
            'waddress' => 'sometimes|required',
        ];
    }
}
