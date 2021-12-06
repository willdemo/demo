<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        		'student_number' => 'required|max:100|alpha_num|unique:students',
        		'first_name' => 'required|max:100',
        		'last_name' => 'required|max:100',
        		'classroom_id' => 'required|exists:classrooms,id',
        ];
    }
}
