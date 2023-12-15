<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Foundation\Http\FormRequest;

class StoreGroupUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function request(User $user, GroupUser $group)
{
    // Check if the user is authorized to send a join request for the group
    return true;  // or implement your custom authorization logic here
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
