<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeRequest extends FormRequest
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

            'name' => 'required|min:3|max:40',
            'age' => 'required|integer',
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O :attribute é obrigatório',
            'min' => 'O campo :attribute deve ter no mínimo 3 digitos',
            'max' => 'O campo :attribute deve ter no máximo 40 digitos',
            'integer' => 'O campo :attribute deve ser um número',
        ];
    }
}
