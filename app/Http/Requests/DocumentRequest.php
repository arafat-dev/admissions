<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DocumentRequest extends FormRequest
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
        $admissionApplication = Auth::guard('student')->user()->admissionApplication;
        $studentBForm = $admissionApplication?->student_b_form ? 'nullable' : 'required';
        $guardianBFoem = $admissionApplication?->guardian_b_form ? 'nullable' : 'required';
        $inter = $admissionApplication?->intermediate_certificate ? 'nullable' : 'required';
        $domicile = $admissionApplication?->domicile_certificate ? 'nullable' : 'required';

        return [
            'cnic_image' => "$studentBForm|file|max:2048|mimes:png,jpg,pdf",
            'guardian_cnic_image' => "$guardianBFoem|file|max:2048|mimes:png,jpg,pdf",
            'a_level_certificate' => "$inter|file|max:2048|mimes:png,jpg,pdf",
            'domicile_certificate' => "$domicile|file|max:2048|mimes:png,jpg,pdf",
            'noc_from_other_board' => 'nullable|file|max:2048|mimes:png,jpg,pdf',
            'hafiz_e_quran_certificate' => 'nullable|file|max:2048|mimes:png,jpg,pdf',
            'disability_certificate' => 'nullable|file|max:2048|mimes:png,jpg,pdf',
        ];
    }

    public function messages()
    {
        return [
            'cnic_image.required' => 'Student CNIC / B-Form Image (front side) is required',
            'guardian_cnic_image.required' => 'Parent /Guardian CNIC / B-Form Image (front side) is required',
            'a_level_certificate.required' => 'Intermediate / A-Levels Certificate is required'
        ];
    }
}
