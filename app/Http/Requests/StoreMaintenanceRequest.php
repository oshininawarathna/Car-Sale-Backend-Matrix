<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceRequest extends FormRequest
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
            "cost" => "required",
            "comment" => "required",
            "vehicleid" => "required",
            "brand" => "required",
            "model" => "required",
            "chassis_no" => "required"
        ];
    }
}
