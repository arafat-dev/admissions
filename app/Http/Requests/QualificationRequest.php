<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QualificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'board' => 'required',
            'degree' => 'required',
            'degree_group' => 'required',
            'institute_name' => 'required|string',
            'roll_number' => 'required|numeric',
            'registration_number' => 'required|string',
            'passing_year' => 'required|numeric',
            'total_marks' => 'required|numeric|min:0',
            'obtained_marks' => 'required|numeric|min:0|max:'.$this->total_marks,
            'percentage' => 'required|numeric|min:0|max:100',

            'a_level_degree' => 'required',
            'a_level_board' => 'required',
            'a_level_institute_name' => 'required|string',
            'major_subject' => 'required|string',
            'a_level_roll_number' => 'required|numeric',
            'a_level_registration_number' => 'required|string',
            'a_level_passing_year' => 'required|numeric',
            'a_level_total_marks' => 'required|numeric|min:0',
            'a_level_obtained_marks' => 'required|numeric|min:0|max:'.$this->a_level_total_marks,
            'a_level_percentage' => 'required|numeric|min:0|max:100',
            'scholarship' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'a_level_degree.required' => 'The degree field is required.',
            'a_level_board.required' => 'The board field is required.',
            'a_level_institute_name.required' => 'The institute name field is required.',
            'a_level_roll_number.required' => 'The roll number field is required.',
            'a_level_registration_number.required' => 'The registration number field is required.',
            'a_level_passing_year.required' => 'The passing year field is required.',
            'a_level_total_marks.required' => 'The total marks field is required.',
            'a_level_obtained_marks.required' => 'The obtained marks field is required.',

            'a_level_obtained_marks.min' => 'The obtained marks must not be less than the total marks.',
            'a_level_obtained_marks.max' => 'The obtained marks must not be greater than the total marks.',
            'a_level_registration_number.numeric' => 'The registration number must be a number.',
            'a_level_roll_number.numeric' => 'The roll number must be a number.',
        ];
    }
}
