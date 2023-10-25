<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tourDeatilRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'tourName' => [
                'required',
                'max:100',
                'min:2',
            ],
            'tourCode' => [
                'required',
                'max:30',
                'min:1',
            ],
        ];
    }

    public function messages()
    {
        return [
            'tourName.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'tourName.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'tourName.required' => "Không được bỏ trống :attribute ",
            'tourCode.max' =>"Không được nhập :attribute nhỏ hơn :max kí tự",
            'tourCode.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'tourCode.required' => "Không được bỏ trống :attribute ",
        ];
    }

    public function attributes()
    {
        return [
            'tourName' => 'tên thể loại tour',
            'tourCode' => 'mã thể loại tour',
        ];
    }
}
