<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>['required','string'],
            'email'=>['required','email', 'unique:users,email'],
            'password'=>['required'],
            
        ];
    }

    public function message(){
        return[
        'name.required'=>'Your name is required',
        'email.required'=>'Your name is required',
        'password.required'=>'Your name is required',
        'email.email'=>'Please usse a validd email address',
        'email.unique'=>'This email already exists, please choose another one',
        'password.min'=>'Please enter character above 6'
        ];
    }
}
