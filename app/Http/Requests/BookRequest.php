<?php

namespace App\Http\Requests;

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
            'book_id' => 'required|numeric',
            'startDate' => 'required|date|date_format:Y-m-d|after:yesterday',
            'endDate' => 'required|date|date_format:Y-m-d|after:startDate',
            'note' => 'nullable|string'
        ];
    }

    /**
     * Get the error mes messages that apply to the invalid request.
     * @return array
     */
    public function messages()
    {
        return [
            'startDate.after' => 'Başlangıç tarihi, geçmiş bir tarih olmamalıdır. !',
            'endDate.after' => 'Bitiş tarihi, başlangıç tarihinden sonra bir tarih olmalıdır. !'
        ];
    }
}
