<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'is_draft' => 'required',
            'image' => 'required',
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
            'title.required' => 'El titulo no puede estar vacio',
            'title.max' => 'El titulo no puede exceder los 255 caracteres',
            'body.required' => 'El contenido no puede estar vacio',
            'is_draft.required' => 'Tienes que seleccionar si es un borrador o no',
            'image.required' => 'Tienes que introducir una imagen.'
        ];
    }
}