<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class InteraccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Perro_interesado_id' => 'required|integer',
            'Perro_candidato_id' => 'required|integer',
            'preferencia' => 'required|string|alpha',
        ];
    }


    public function messages()
    {
    return[
        'Perro_interesado_id.required' => 'La id del perro interesado es obligatoria',
        'Perro_interesado_id.integer' => 'La id del perro interesado debe ser un entero',
        'Perro_candidato_id.required' => 'La id del perro candidato es obligatoria',
        'Perro_candidato_id.integer' => 'La id del perro candidato debe ser un entero',
        'preferencia.required' => 'La "Preferencia" es obligatoria',
        'preferencia.string' => 'La preferencia debe ser un string',
        'preferencia.alpha' => 'La preferencia debe ser un string alfabético [A-Z]]',
    ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST));
    }
}
