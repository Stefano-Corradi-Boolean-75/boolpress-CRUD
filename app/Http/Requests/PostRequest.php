<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:3',
            'date' => 'required',
            'text' => 'required|min:10',
            'image' => 'nullable|image|max:32000',
        ];
    }

    public function messages(){

        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'date.required' => 'Il data è un campo obbligatorio',
            'title.max' => 'Il titolo può avere al massimo :max caratteri',
            'title.min' => 'Il titolo può avere al minimo :min caratteri',
            'text.required' => 'Il testo è un campo obbligatorio',
            'text.min' => 'Il testo può avere al minimo :min caratteri',
            'image.image' => 'Il file immagine non è corretto',
            'image.max' => 'Il file immagine deve essere al massimo di 3 mega',
        ];

    }
}
