<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            //
            'file' => 'max:1024'
        ];
    }
    public function messages()
{
    return [
        'file.required' => 'No ha seleccionado ningun archivo.',
        'file.max' => 'El archivo es demasiado pesado, debe pesar menos de :max kb.',
    ];
}
}
