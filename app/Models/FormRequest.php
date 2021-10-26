<?php


namespace App\Models;


class FormRequest
{
    static public function validateForm(): array
    {
        return request()->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'max:255'],
            'body' => ['required'],
            'completed' => [],
        ]);

    }
}
