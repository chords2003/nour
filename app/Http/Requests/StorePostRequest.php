<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'body' => 'required|max:500',
            // 'title' => 'required|max:200',
            // 'image' => 'nullable|mimes:jpg,png,jpeg,mp4,ogx,oga,ogv,ogg,webm,heic|max:4096'
        ];
    }
}
