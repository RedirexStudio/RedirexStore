<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Routing;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'page_title' => 'required|min:5|max:50',
            'page_url' => 'unique:routings,url,' . (Routing::where('post_id',$this->id)->get()->first() ? Routing::where('post_id',$this->id)->get()->first()->id : NULL) . '|required|min:5|max:50',
        ];
    }

    public function messages(){
        return [
            'page_title.required' => 'Поле: "Название страницы" - Обязательно!',
            'page_url.required' => 'Поле: "url страницы" - Обязательно!',
            'page_url.unique' => 'Какая-то из страниц уже имеет такой URL',
            'page_title.min' => 'В поле: "Название страницы" должно быть не менее 5 символов!',
            'page_title.max' => 'В поле: "Название страницы" должно быть не более 50 символов!',
        ];
    }

}
