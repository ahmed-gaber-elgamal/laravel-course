<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|min:3',
            'description' => 'required|min:10',
        
        ];
    }
    public function messages()
{
    return [
        'title.required' => "title can't be empty" ,
            'title.min' => "title can't be less than 3 chars" ,
            'title.unique' => "title must be unique " ,
            'description.required' => "description can't be empty",
            
    ];
}


}
