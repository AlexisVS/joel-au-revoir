<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGoodbyeCardRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'author_name' => ['required', 'string'],
            'author_email' => ['email'],
            'message' => ['required', 'string'],
            'card_color' => ['hex_color'],
            'has_asset' => ['boolean'],
            'asset_type' => ['required_if_accepted:has_asset ,string', 'in:image,video'],
            'asset_file' => ['required_if_accepted:has_asset, file'],
        ];
    }
}
