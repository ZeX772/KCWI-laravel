<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiRequest;

class CourseRequest extends FormRequest
{
    use ApiRequest;

    protected $defaultRules = [
        'course_full_price'     => 'string|required',
        'course_remarks'        => 'string|required',
        'course_level'          => 'int|required',
        // 'school_id'             => 'int|required|exists:schools,id', 
        'course_status'         => 'string|required',
        'course_size'           => 'string|required',
        'venue'                 => 'int',
        'course_classes'          => 'array',
    ];

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
        return $this->defaultRules;
    }

    public function update()
    {
        return $this->defaultRules;
    }
}
