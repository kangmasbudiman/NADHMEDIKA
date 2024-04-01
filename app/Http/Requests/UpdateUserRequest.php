<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateUserRequest extends FormRequest
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
            'id'=>'required',
            'name'=>'required',
            'username'=>'required',
            'email'=>[
                //'unique:users,email',
                 Rule::unique('users','email')->ignore($this->id,'id'),
                'email',
            ],  
                 
            'level'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required',
            'gender'=>'required',
            'idpendidikan'=>'required',
            'agama'=>'required',
            'ktp'=>'required',
        ];
    }
}
