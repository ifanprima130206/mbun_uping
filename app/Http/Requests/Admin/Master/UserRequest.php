<?php

namespace App\Http\Requests\Admin\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id = $this->route('user_id') ? decrypt($this->route('user_id')) : NULL;

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'phone' => 'required|numeric|digits_between:10,15',
            'password' => $id 
                ? 'nullable|string|min:8|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$/'
                : 'required|string|min:8|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$/',
            'role' => 'required|in:0,1',
            'address' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',

            'phone.required' => 'Nomor Whatsapp wajib diisi.',
            'phone.numeric' => 'Nomor Whatsapp harus berupa angka.',
            'phone.digits_between' => 'Nomor Whatsapp harus antara 10 hingga 15 digit.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',

            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',

            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',
            'address.max' => 'Alamat tidak boleh lebih dari 500 karakter.',
        ];
    }
}
