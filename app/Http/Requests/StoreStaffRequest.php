<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
            "first_name"=>"required",
            "last_name"=>"required",
            "ph_no"=>"required|max:10|min:10",
            "address"=>"required",
            "nic"=>"required|max:12|min:9",
            "email"=>"required",
            "gender"=>"required",
            "d_o_b"=>"required",
            "position"=>"required",
            "shift"=>"required",
            "salary"=>"required",
            "image"=>"max:2048"
        ];
    }
}
