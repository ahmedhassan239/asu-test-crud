<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required',
            'body_en' => 'required',
            'body_ar' => 'required',
            'page_link' => 'required',
            //'tags_en ' => 'required',
            'tags_ar' => 'required',
            'meta_desc' => 'required',
            'image_url' => 'required',
            
        ];
    }
}
