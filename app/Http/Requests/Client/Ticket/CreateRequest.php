<?php

namespace App\Http\Requests\Client\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:client_users,id',
            'subject' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'status' => 'required|in:Open,Processing,Solved,Suspend,Closed',                  
            'priority' => 'required|in:High,Medium,Low',
            'msg' => 'required|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'Client ID is required.',
            'client_id.exists' => 'The selected client ID is invalid.',
            'project_name.required' => 'Project name is required.',
            'project_name.max' => 'Project name cannot exceed 255 characters.',
            'status.required' => 'Status is required.',
            'status.in' => 'Invalid status value.',
            'msg.required' => 'Message content is required.',
            'msg.min' => 'Message must be at least 10 characters long.'
        ];
    }
}
