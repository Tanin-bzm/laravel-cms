<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'=>['required','max:50',
            //  new Uppercase()
            ],
            'content'=>'required',
        'file'=>['required','max:1000','mimes:jpg,png']
    ];
    }

    public function messages()
    { 
        return['title.required'=>'لطفا عنوان را انتخاب کنید',
        'title.max'=>'تعداد کارکتر باید بیش ار دوتا باشد',
        'content.required'=>'لطفا توضیحات را بنویسید',
        'file.required'=>'تصویر را اپلود کنید',
        'file.max'=>'حجم فایل شما بیش از 1مگ است',
        'fie.mimes'=>'ای فرمت پشتیبانی نمیشود', ];
   }
}