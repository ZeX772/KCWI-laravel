<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiRequest;

class CoachRequest extends FormRequest
{
    use ApiRequest;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function add()
    {
        return [
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'username'          => 'required|string|max:250|unique:users',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:6|confirmed',
            'hkid'              => 'required|string',
            'phone'             => 'required|string',
            'dob'               => 'required|string',
            'address'           => 'required|string',
            'start_date'        => 'required|string',
            'end_date'          => 'required|string',
            'remarks'           => 'required|string',
            'payment_method'    => 'required|string',
            'payment_type'      => 'required|string',
            'monthly_rate'      => 'required|string',
            'bank'              => 'required|array',
            'availability'      => 'required|array',
        ];
    }

    public function update()
    {
        return [
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'username'          => 'required|string|max:250',
            'email'             => 'required|string|email|max:255',
            'hkid'              => 'required|string',
            'phone'             => 'required|string',
            'dob'               => 'required|string',
            'address'           => 'required|string',
            'start_date'        => 'required|string',
            'end_date'          => 'required|string',
            'remarks'           => 'required|string',
            'payment_method'    => 'required|string',
            'payment_type'      => 'required|string',
            'monthly_rate'      => 'required|string',
            'bank'              => 'required|array',
            'availability'      => 'required|array',
            'id'                => 'required|string',
        ];
    }

    public function archive()
    {
        return [
            'id' => 'int|required',
        ];
    }

    public function unarchive()
    {
        return [
            'id' => 'int|required',
        ];
    }
}
