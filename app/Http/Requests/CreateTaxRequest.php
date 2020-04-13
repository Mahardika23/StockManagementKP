<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaxRequest extends FormRequest
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
            'nama' => 'required|unique:taxes|string',
            //
        ];
    }
    public function messages()
    {
        return [
            'nama.unique' => 'Pajak Tersebut Sudah Terdaftar',
            //
        ];
    }
}
