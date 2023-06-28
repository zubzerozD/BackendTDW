<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class PerroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
     public function authorize()
     {
         return true;
     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|alpha',
            'url' => 'required|string|url',
            'description' => 'required|string|alpha',
        ];
    }
    public function messages()
    {
    return[
        'name.required' => 'El nombre es obligatorio',
        'name.string' => 'El nombre debe ser un string',
        'name.alpha' => 'El nombre debe ser un string alfabético [A-Z]',
        'url.required' => 'La url es obligatoria',
        'url.string' => 'La url debe ser un string',
        'url.url' => 'La url debe ser una url válida',
        'description.required' => 'La descripción es obligatoria',
        'description.string' => 'La descripción debe ser un string',
        'description.alpha' => 'La descripción debe ser un string alfabético [A-Z]',
    ];
    }
    protected function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST));
}
}
