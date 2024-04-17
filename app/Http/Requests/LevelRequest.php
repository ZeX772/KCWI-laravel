<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiRequest;

class LevelRequest extends FormRequest
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
            'name'          => 'string|required',
            'default_price' => 'numeric|required',
        ];
    }

    public function update()
    {
        return [
            'id'            => 'int|required',
            'name'          => 'string|required',
            'default_price' => 'numeric|required',
        ];
    }
}
