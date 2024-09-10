<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateArchieveRequest extends FormRequest
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
            'foto'    => 'mimes:jpeg,png,jpg |max:4096',
            'kk'      => 'mimes:pdf|max:2048',
            'akta'    => 'mimes:pdf|max:2048',
            'nisn'    => 'mimes:pdf|max:2048',
            'raport1' => 'mimes:pdf|max:2048',
            'raport2' => 'mimes:pdf|max:2048',
            'raport3' => 'mimes:pdf|max:2048',
            'raport4' => 'mimes:pdf|max:2048',
            'raport5' => 'mimes:pdf|max:2048',
            'skl'     => 'mimes:pdf|max:2048',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
