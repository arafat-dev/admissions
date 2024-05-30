<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
        $adminApplication = Auth::guard('student')->user()->admissionApplication;

        $profileImage = $adminApplication?->profile_image ? 'nullable' : 'required';
        $parentImage = $adminApplication?->parent_image ? 'nullable' : 'required';

        return [
            'profile_image' => "$profileImage|image|max:2048|mimes:png,jpg,jpeg",
            'name' => 'required',
            'national_id' => 'required|string',
            'father_name' => 'required|string',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'blood_group' => 'required|string',
            'religion' => 'required|string',
            'dob' => 'required',
            'special_person' => 'required',
            'physical_disability' => 'required',
            'parent_image' => "$parentImage|image|max:2048|mimes:png,jpg,jpeg",
            'relationship' => 'required',
            'parent_name' => 'required|string',
            'parent_profession' => 'required|string',
            'parent_national_id' => 'required',
            'parent_phone' => 'required',
            'parent_email' => 'required|email',
            'province' => 'required',
            'district' => 'required',
            'city' => 'required',
            'permanent_address' => 'required',
            'postal_address' => 'required'
        ];
    }
}
