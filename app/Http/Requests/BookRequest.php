<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'genre' => 'required',
            'author' => 'required',
            'title' => 'required',
            'amount' => 'required|numeric',
        ];
    }
}
