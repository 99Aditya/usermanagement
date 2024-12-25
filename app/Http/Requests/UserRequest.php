<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'mobile' => 'required|digits:10|numeric|regex:/^[6-9]\d{9}$/', 
            'address' => 'required|string|max:500',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|digits:6|numeric',
            'martial_status' => 'required|in:1,2',
            'married_date' => 'nullable',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'hobbies.*' => 'required|string|max:255',
    
            'username.*' => 'required|string|max:255',
            'user_birthdate.*' => 'required|date',
            'user_martial_status.*' => 'required|in:1,2',
            'education.*' => 'required|string|max:255',
            'user_married_date.*' => 'nullable',
            'user_photos.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'The first name field is required.',
            'lastname.required' => 'The last name field is required.',
            'birthdate.required' => 'Please select your birth date.',
            'mobile.required' => 'The mobile number field is required.',
            'mobile.digits' => 'The mobile number must be exactly 10 digits.',
            'mobile.regex' => 'The mobile number must start with 6, 7, 8, or 9.',
            'address.required' => 'The address field is required.',
            'state.required' => 'Please select a state.',
            'city.required' => 'Please select a city.',
            'pincode.required' => 'The pincode field is required.',
            'pincode.digits' => 'The pincode must be exactly 6 digits.',
            'martial_status.required' => 'Please select your marital status.',
            'photo.required' => 'Please select photo.',
            'photo.image' => 'The photo must be an image.',
            'photo.mimes' => 'The photo must be a file of type: jpg, jpeg, png.',
            'photo.max' => 'The photo must not exceed 2MB.',
            'hobbies.*.required' => 'The hobbies field is required.',
            'hobbies.*.string' => 'Each hobby must be a valid string.',
            'hobbies.*.max' => 'Each hobby must not exceed 255 characters.',

            'username.*.required' => 'The username field is required for all users.',
            'user_birthdate.*.required' => 'The birthdate field is required for all users.',
            'user_martial_status.*.required' => 'The marital status field is required for all users.',
            'education.*.required' => 'The education field is required for all users.',
            'user_photos.*.required' => 'Please select user photo.',
            'user_photos.*.image' => 'The user photo must be an image.',
            'user_photos.*.mimes' => 'The user photo must be a file of type: jpg, jpeg, png.',
            'user_photos.*.max' => 'The user photo must not exceed 2MB.',
        ];
    }
}
