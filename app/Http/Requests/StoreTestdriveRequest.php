<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestdriveRequest extends FormRequest
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
            "name" => "required",
            "contact" => "required|max:10|min:10",
            "email" => "required",
            "profession" => "required",
            "address" => "required",
            "cus_req"=>"required",
            "make" => "required",
            "brand" => "required",
            "model" => "required",
            "year_manufacture" => "required"
        ];
    }
}
