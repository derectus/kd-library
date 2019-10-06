<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'cover' => ['nullable', 'image'],
            'title' => ['required', 'string'],
            'type' => ['required', 'string'],
            'isbn' => ['nullable', 'string'],
            'location_id' => ['nullable', 'exists:cities,id'],
            'publication_year' => ['nullable', 'date', 'date_format:Y-m-d'],
            'authors' => ['nullable', 'array'],
            'publisher' => ['nullable', 'integer'],
            'category' => ['nullable', 'integer'],
            'description' => ['nullable', 'string']
        ];
    }
}
