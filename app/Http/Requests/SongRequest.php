<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author'   => ['required', 'min:3', 'max:255'],
            'album'    => ['required', 'min:3', 'max:255'],
            'name'     => ['required', 'min:3', 'max:255'],
            'duration' => [],
        ];
    }
}
