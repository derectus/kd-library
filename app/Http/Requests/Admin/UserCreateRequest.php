<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidPhone;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:55'],
            'is_admin' => ['required', 'boolean'],
            'is_banned' => ['required', 'boolean'],
            'job' => ['nullable', 'string'],
            'city_id' => ['nullable', 'exists:cities,id'],
            'phone' => ['nullable', new ValidPhone, 'max:18'],
            'address' => ['nullable', 'string', 'max:150'],
            'zip' => ['nullable', 'max:5'],
            'sex' => ['nullable', 'string', 'max:5'],
            'birthdate' => ['nullable', 'date', 'date_format:Y-m-d', 'before:yesterday']
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Adres bilgisi boş bırakılamaz. !',
            'phone' => 'Lütfen geçerli bir telefon numarası giriniz!',
            'zip.max' => 'Lütfen geçerli bir posta kodu giriniz!',
            'city_id.exists' => '82 Henüz Eklenmedi :) Lütfen geçerli bir şehir seçiniz. !',
            'address.max' => 'Adres bilgi maksimum 150 karakter olmalıdır !',
            'email.exists' => 'Email kullanılmaktadır.',
            'admin.boolean' => 'Ya admindir ya da değildir işte tüm mesela bu !',
            'sex.max' => 'Seçeneklerde var olmadığını düşünüyorsanız bize bildirin !',
            'birthdate.date' => 'Lütfen geçerli bir tarih değeri giriniz !'
        ];
    }
}
