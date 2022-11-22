<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeRequest extends FormRequest
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

            'address' => 'required|min:3|max:40',
            'number' => 'required|integer',
            'city' => 'required|min:3|max:40',
            'state' => 'required|in:SP,RJ,PE',
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
            'state.in' => 'O campo estado é obrigatório',
        ];
    }
}
