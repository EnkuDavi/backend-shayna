<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required|max:64',
            'email' => 'required|email|max:48',
            'number' => 'required|max:16',
            'address' => 'required',
            'transaction_total' => 'required|integer',
            'transaction_status' => 'nullable|string:PENDING,SUCCESS,FAILED',
            'transaction_detail' => 'required|array',
            'transaction_detail.*' => 'integer|exists:products,id'
        ];
    }
}
