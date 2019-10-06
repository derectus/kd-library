<?php

namespace App\Http\Requests\Auth;

use App\Rules\ValidPhone;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'job' => ['nullable', 'string'],
            'city_id' => ['required', 'exists:cities,id'],
            'phone' => ['required', new ValidPhone, 'max:18'],
            'address' => ['required', 'string', 'max:150'],
            'zip' => ['required', 'size:5'],
            'sex' => ['nullable', 'string', 'max:5'],
            'birthdate' => ['nullable', 'date', 'date_format:Y-m-d', 'before:yesterday']
        ];
    }


    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'address.required' => 'Adres bilgisi boş bırakılamaz. !',
            'phone.required' => 'Lütfen geçerli bir telefon numarası giriniz!',
            'zip.size' => 'Lütfen geçerli bir posta kodu giriniz!',
            'city_id.exists' => '82 Henüz Eklenmedi :) Lütfen geçerli bir şehir seçiniz. !',
            'address.max' => 'Adres bilgi maksimum 150 karakter olmalıdır !',
            'sex.max' => 'Seçeneklerde var olmadığını düşünüyorsanız bize bildirin !',
            'birthdate.date' => 'Lütfen geçerli bir tarih değeri giriniz !'

        ];
    }
}
