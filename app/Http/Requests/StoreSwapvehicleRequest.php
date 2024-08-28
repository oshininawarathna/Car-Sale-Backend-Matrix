<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSwapvehicleRequest extends FormRequest
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
            "cus_make"=>"required",
            "cus_brand" => "required",
            "cus_model" => "required",
            "cus_year_manufacture" => "required",
            "year_registration" => "required",
            "cus_ownership" => "required",
            "chassis_no" => "required",
            "cus_fuel_type" => "required",
            "mileage" => "required",
            "remarks" => "required",
            "brand" => "required",
            "model" => "required",
            "make" => "required",
            "ownership" => "required",
            "year_manufacture" => "required",
            "fuel_type" => "required",
            "decision" => "required"
        ];
    }
}
