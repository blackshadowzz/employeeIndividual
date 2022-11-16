<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpRequest extends FormRequest
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
            'fname' =>'required|min:1|max:50',
            'lname' =>'required|min:1|max:50',
            'email' =>'required|min:1|max:100',
            'phone' =>'required|min:1|max:15',
            'position_id' =>'required|integer',
        ];
    }
}
