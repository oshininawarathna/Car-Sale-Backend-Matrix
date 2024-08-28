<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            "brand" => "required",
            "model" => "required",
            "make" => "required",
            "year_manufacture" => "required",
            "year_registration" => "required",
            "chassis_no" => "required",
            "unit_price" => "required",
            "query" => "required"
        ];
    }
}
